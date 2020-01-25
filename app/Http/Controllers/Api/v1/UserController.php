<?php namespace App\Http\Controllers\Api\v1; 
use App\User;
use CURLFile;
use Exception;
use App\Models\Finexus;
use App\Models\Loadcard;
use PDF;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Helpers\BaseFunction\BaseFunction;

class UserController extends Controller
{
    protected $request;

    public function __construct(Request $request){
        $this->request = $request;
    }	

    public function createUser(){
        $data      = $this->request->all();
		$rules     = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
            'contact_number' => ['required', 'string', 'max:255', 'unique:users,contactNumber'],
            'card_number' => ['required', 'string', 'digits:16', 'unique:users,cardNumber'],
            'country_code' => ['required'],
        ];
        $validator = Validator::make($data, $rules, []);
        
		if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 200);
        }
        try {

            $user = new User();
			
            $user_data['first_name'] = $data['first_name'];
            $user_data['last_name'] = $data['last_name'];
            $user_data['email'] = $data['email'];
            $user_data['password'] = Hash::make($data['email']);
            $user_data['cardNumber'] = $data['card_number'];
            $user_data['contactNumber'] = $data['contact_number'];
            $user_data['countryCode'] = $data['country_code'];
			
			$user_data['dob'] = (!empty($data['dob']))? $data['dob'] : '';
			$user_data['urnNumber'] = (!empty($data['urn']))? $data['urn'] : ''; 
			$user_data['pep'] = (!empty($data['pep']))? $data['pep'] : ''; 
			$user_data['city'] = (!empty($data['city']))? $data['city'] : ''; 
			$user_data['state'] = (!empty($data['state']))? $data['state'] : '';
			$user_data['d_country'] = (!empty($data['country']))? $data['country'] : ''; 
			$user_data['pincode'] = (!empty($data['zipcode']))? $data['zipcode'] : ''; 
			$user_data['address1'] = (!empty($data['address1']))? $data['address1'] : ''; 
			$user_data['address2'] = (!empty($data['address2']))? $data['address2'] : ''; 
			$user_data['nationality'] = (!empty($data['nationality']))? $data['nationality'] : ''; 
			$user_data['passport_id'] = (!empty($data['passport_id']))? $data['passport_id'] : ''; 
			$user_data['maiden_name'] = (!empty($data['maiden_name']))? $data['maiden_name'] : ''; 
			
			if(!empty($this->request->signimage)){

                    $filename = str_random(10).'.'.'png';
                    $user->id.'--'.$this->request->signimage->getClientOriginalName();
                    $this->request->signimage->move(public_path('/img/sign/'), $filename);
                    $user_data['img_sign'] = $filename;
				 
                    //$image = $this->request->signimage ?? ''; // your base64 encoded
                    //$image = str_replace('data:image/png;base64,', '', $image);
                    //$image = str_replace(' ', '+', $image);
                    //$imageName = str_random(10).'.'.'png';
                    //\File::put(public_path(). '/img/sign/' . $imageName, base64_decode($image));
                    //$data['img_sign'] = $imageName;
                }
				
            $user_data['vendor_id'] = auth()->user()->id;
            $user->fill($user_data);
            if($user->save()){
                \DB::table('role_user')->insert(['user_id' => $user->id,'role_id' => 2]);
                
                $data['user_id'] = $user->id;
                $data['title'] = $this->request->title ?? '';
                $data['name'] = $this->request->first_name.' '.$this->request->last_name;
                $data['nric_no'] = $this->request->nric_no ?? '';
                $data['dob'] = \Carbon\Carbon::parse($this->request->dob)->format('Y-m-d');
                $data['sex'] = $this->request->sex ?? '';
                $data['nationality'] = $this->request->nationality ?? '';
                $data['residential_address'] = $this->request->address ?? '';
                $data['country'] = $this->request->country ?? '';
                $data['postal_code'] = $this->request->pincode ?? '';
                $data['state'] = $this->request->state ?? '';
                $data['mailing_address'] = $this->request->mail_address ?? '';
                $data['mailing_country'] = $this->request->m_country ?? '';
                $data['mailing_postalcode'] = $this->request->m_postalcode ?? '';
                $data['mailing_state'] = $this->request->m_state ?? '';
                $data['mobile_no'] = $this->request->contact_number ?? '';
                $data['c_code'] = $this->request->country_code ?? '';
                $data['security_ans'] = $this->request->security ?? '';
                $data['passport_no'] = $this->request->passport_id ?? '';
                $data['email'] = $this->request->email ?? '';
				$data['img_sign'] = $filename;
                 

                $finexus = new Finexus();
                $finexus->fill($data);
                if($finexus->save()){
                    $datas['is_kyc_details'] = '1';
                    User::where('id',$user->id)->update($datas);
                }

                  $pdf_data['data'] = $data;
                  $pdf_data['data']['img_sign'] = URL::to('public/img/sign/' . $data['img_sign']);
                  $pdf_data['data']['card_no'] = $user->cardNumber;
                  $pdf = PDF::loadView('pdf.kyc', $pdf_data);
                  $name = $user->id . '-KYC-FINEXUS.pdf';
                  $pdf->save('public/img/finexus_kyc/'.$name);
                  $kycImg =URL::to('public/img/finexus_kyc/'.$name);
				 
                //$kycImg = 'https://www.antennahouse.com/XSLsample/pdf/sample-link_1.pdf';
                
             /*   $response['balance_usd'] = $user->balance_usd ?? 0.0;
                $response['Bbalance_btcTC'] = $user->Bbalance_btcTC ?? 0.0;
                $response['balance_eth'] = $user->balance_eth ?? 0.0;  */
                $response['card_number'] = $user->cardNumber ?? 0.0;
                $response['email'] = $user->email;

                // Send User to Boundless Pay
                $api_data['card_number'] = $data['card_number'];
                $api_data['email'] = $data['email'];
                $api_data['info'] = [
                    'dob' => (!empty($data['dob']))? $data['dob'] : '',
                    'pep' => (!empty($data['pep']))? $data['pep'] : '',
                    // 'pep' => 'false',
                    'city' => (!empty($data['city']))? $data['city'] : '',
                    'state' => (!empty($data['state']))? $data['state'] : '',
                    'country' => (!empty($data['country']))? $data['country'] : '',
                    'zipcode' => (!empty($data['zipcode']))? $data['zipcode'] : '',
                    'address1' => (!empty($data['adress1']))? $data['address1'] : '',
                    'address2' => (!empty($data['adress2']))? $data['address2'] : '',
                    'first_name' => $data['first_name'].' '.$data['last_name'],
                    'idDocType' => (!empty($data['doc_type']))? $data['doc_type'] : '',
                    'passport_id' => (!empty($data['passport_id']))? $data['passport_id'] : '',
                    'nationality' => (!empty($data['nationality']))? $data['nationality'] : '',
                    'phone_number' => (!empty($data['contact_number']))? $data['contact_number'] : '',
                    'finexus_KYC' => $kycImg,
                ];

                // $api_data['first_name'] = $data['first_name'];
                // //$api_data['last_name'] = $data['last_name'];
                // //$api_data['title'] = $data['title']?? 'Mr/Ms';
                // $api_data['email'] = $data['email'];
                // $api_data['card_number'] = $data['card_number'];
				// $api_data['pep'] = (!empty($data['pep']))? $data['pep'] : '';
				// $api_data['urn'] = (!empty($data['urn']))? $data['urn'] : '';
				// $api_data['dob'] = (!empty($data['dob']))? $data['dob'] : '';
				
				// $api_data['city'] = (!empty($data['city']))? $data['city'] : '';
				// $api_data['state'] = (!empty($data['state']))? $data['state'] : '';
				// $api_data['country'] = (!empty($data['country']))? $data['country'] : '';
				// $api_data['zipcode'] = (!empty($data['zipcode']))? $data['zipcode'] : '';
				// $api_data['address1'] = (!empty($data['adress1']))? $data['address1'] : '';
				// $api_data['address2'] = (!empty($data['adress2']))? $data['address2'] : '';
				// $api_data['nationality'] = (!empty($data['nationality']))? $data['nationality'] : '';
				// $api_data['passport_id'] = (!empty($data['passport_id']))? $data['passport_id'] : ''; 
				// //$api_data['maiden_name'] = (!empty($data['maiden_name']))? $data['maiden_name'] : ''; ;
                // $api_data['phone_number'] = (!empty($data['contact_number']))? $data['contact_number'] : '';
                
                $result = BaseFunction::callApi('POST', 'https://boundlesspay.exchange/api/v1/users', json_encode($api_data), ['Content-Type: application/json']);
                
                $imgArray['remote_urls'][] = $kycImg;
                $imgArray['remote_urls'][] = URL::to('public/img/sign/' . $data['img_sign']);
                $img_headers[] = 'Content-Type:application/json';
                $img_call = BaseFunction::callAPI('POST', 'https://boundlesspay.exchange/api/v1/users/' . $data['card_number'] . '/attachments/remote_urls', json_encode($imgArray), $img_headers);
                // dd($img_call);
                $img_response = json_decode($img_call, true);

                return response()->json($response, 200);
            }

            return response()->json(["error" => "Unable to save user!"], 401);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function getUser($card_number){
        $data      = ['card_number' => $card_number];
		$rules     = [
            'card_number' => ['required', 'string', 'digits:16', Rule::exists('users', 'cardNumber')->where(function ($query) {
                $query->where('vendor_id', auth()->user()->id);
            })],
        ];
        
        $validator = Validator::make($data, $rules, []);
        
		if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 200);
        }
        try {
            $user = User::where('cardNumber', $card_number)->first();
            if(!empty($user)){
                /* $response['balance_usd'] = $user->balance_usd ?? 0;
                $response['Bbalance_btcTC'] = $user->Bbalance_btcTC ?? 0;
                $response['balance_eth'] = $user->balance_eth ?? 0;   */
                $response['card_number'] = $user->cardNumber;
                $response['email'] = $user->email;
                return response()->json($response, 200);
            }

            return response()->json(["error" => "Unable to fetch user details!"], 401);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function createAttachment($card_number){
        $data      = $this->request->all() + ['card_number' => $card_number];
		$rules     = [
            'file' => ['required', 'file'],
            'card_number' => ['required', 'string', 'digits:16', Rule::exists('users', 'cardNumber')->where(function ($query) {
                $query->where('vendor_id', auth()->user()->id);
            })],
        ];
        
        $validator = Validator::make($data, $rules, []);
        
		if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 200);
        }
        try {
            // Send Attachment to Boundless Pay
            $cfile = new CURLFile($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name']);
            $api_data['file'] = $cfile;
            $api_header[] = 'Content-Type:multipart/form-data';
            $url = 'https://boundlesspay.exchange/api/v1/users/'.$card_number.'/attachments';
            $result = BaseFunction::callApi('POST', $url, $api_data, $api_header);
            
            $user = User::where('cardNumber', $card_number)->first();
            $filename = $user->id.'--'.$this->request->file->getClientOriginalName();
            $this->request->file->move(public_path('/img/kyc'), $filename);
            
            $user_attachment = $user->attachments()->create([
                'name' => $filename,
                'created_at' => date('Y-m- H:i:s'),
                'updated_at' => date('Y-m- H:i:s')
            ]);
            
            $response['id'] = $user_attachment->id;
            // $response['filename'] = url('public/img/kyc/'.$user_attachment->name);
            $response['filename'] = $user_attachment->name;
            return response()->json($response, 200);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function createAttachmentMultiple($card_number){
        // // Send Attachment to Boundless Pay
        // $cfile = null;
        // foreach($this->request->file('files') as $key => $file){
        //     // $cfile['files['.$key.']'] = new CURLFile($file, $_FILES['files']['type'][$key], $_FILES['files']['name'][$key]);
        //     // $cfile['files['.$key.']'] = new CURLFile($_FILES['files']['tmp_name'][$key], $_FILES['files']['type'][$key], $_FILES['files']['name'][$key]);
        //     $cfile['files['.$key.']'] = '@'.$_FILES['files']['tmp_name'][$key];
        // }
        // $api_data = $cfile;
        // // dd($api_data);
        // $api_header[] = 'Content-Type:multipart/form-data';
        // $url = 'https://boundlesspay.exchange/api/v1/users/'.$card_number.'/attachments/create_all';
        // $result = BaseFunction::callApi('POST', $url, $api_data, $api_header);
        // dd($result);

        $data      = $this->request->all() + ['card_number' => $card_number];
		$rules     = [
            'files' => ['present', 'array', 'max:3'],
            'files.*' => ['required', 'file'],
            'card_number' => ['required', 'string', 'digits:16', Rule::exists('users', 'cardNumber')->where(function ($query) {
                $query->where('vendor_id', auth()->user()->id);
            })],
        ];
        
        $validator = Validator::make($data, $rules, []);
        
		if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 200);
        }
        try {
            $user = User::where('cardNumber', $card_number)->first();
            $response = [];
            
            $cfile = [];
            foreach($this->request->file('files') as $key => $file){
                // Send Attachment to Boundless Pay
                $cfile = new CURLFile($_FILES['files']['tmp_name'][$key], $_FILES['files']['type'][$key], $_FILES['files']['name'][$key]);
                $api_data['file'] = $cfile;
                $api_header[] = 'Content-Type:multipart/form-data';
                $url = 'https://boundlesspay.exchange/api/v1/users/'.$card_number.'/attachments';
                $result = BaseFunction::callApi('POST', $url, $api_data, $api_header);

                $filename = $user->id.'--'.$file->getClientOriginalName();
                $file->move(public_path('/img/kyc'), $filename);
                
                $user_attachment = $user->attachments()->create([
                    'name' => $filename,
                    'created_at' => date('Y-m- H:i:s'),
                    'updated_at' => date('Y-m- H:i:s')
                ]);

                $response[$key]['id'] = $user_attachment->id;
                // $response[$key]['filename'] = url('public/img/kyc/'.$user_attachment->name);
                $response[$key]['filename'] = $user_attachment->name;
                // $cfile[] = new CURLFile($_FILES['files']['tmp_name'][$key], $_FILES['files']['type'][$key], $_FILES['files']['name'][$key]);
            }
            
            // // Send Attachment to Boundless Pay
            // $cfile = new CURLFile($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name']);
            // $api_data['file'] = $cfile;
            // $api_header[] = 'Content-Type:multipart/form-data';
            // $url = 'https://boundlesspay.exchange/api/v1/users/'.$card_number.'/attachments';
            // $result = BaseFunction::callApi('POST', $url, $api_data, $api_header);
            // dd($result);
            return response()->json($response, 200);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function cardLoads($card_number){
        $data      = ['card_number' => $card_number];
		$rules     = [
            'card_number' => ['required', 'string', 'digits:16', Rule::exists('users', 'cardNumber')->where(function ($query) {
                $query->where('vendor_id', auth()->user()->id);
            })],
        ];
        
        $validator = Validator::make($data, $rules, []);
        
		if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 200);
        }
        try {
            $user = User::where('cardNumber', $card_number)->first();
            $loadCards = Loadcard::where('userId', $user->id)->get();
            $response = [];
            if(!$loadCards->isEmpty()){
                foreach($loadCards as $key => $loadCard){
                    $response[$key]['id'] = $loadCard->id;
                    $response[$key]['amount'] = $loadCard->amount;
                    $response[$key]['load_fee'] = $loadCard->cardLoadFee;
                    // $response[$key]['to'] = $loadCard->paymentType;
                    //$response[$key]['loaded_at'] = $loadCard->loaded_at->format('Y-m-d H:i:s');
					$response[$key]['loaded_at'] = $loadCard->loaded_at;
                    $response[$key]['status'] = $loadCard->status;
                }
                return response()->json($response, 200);
            }

            return response()->json(["error" => "No records found!"], 401);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
	
	
	
	public function assignCardload($card_number){
		
        $data      = $this->request->all() + ['card_number' => $card_number];
		$amount = $data['amount'];
		
		$rules     = [
            'amount' => ['required'],
            'card_number' => ['required', 'string', 'digits:16', Rule::exists('users', 'cardNumber')->where(function ($query) {
                $query->where('vendor_id', auth()->user()->id);
            })],
        ];
        
        $validator = Validator::make($data, $rules, []);
        
		if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 200);
        }
		
        try {
            $user = User::where('cardNumber', $card_number)->first();
			$vendor = User::where('id', $user->vendor_id)->first();
			
			$partnerFee = ($amount*$vendor->partner_fee)/100;
			
			$cardLoadFee = $amount*1/100;
			$cardLoadFee = ($cardLoadFee < 3) ? 3 : $cardLoadFee;
			$user_payment = Loadcard::create([
                    'userId' => $user->id,
                    'amount' => $amount,
					'partnerFee'=>$partnerFee,
					'cardLoadFee'=>$cardLoadFee,
					'finalAmount'=>$amount - $cardLoadFee,
					'paymentType'=>'erc20',
					'status'=>'pending',
                ]);
			
			$response['userId'] = $user_payment->id;
			$response['amount'] = $amount;
			$response['partnerFee'] = $partnerFee;
			$response['cardLoadFee'] = $cardLoadFee;
			$response['finalAmount'] = $amount - $cardLoadFee;
			$response['paymentType']='erc20';
			$response['status'] = 'pending';
			
            return response()->json($response, 200);
		
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
	
	
	public function getCheckCard($card_number){
        $data      = ['card_number' => $card_number];
		$rules     = [
            'card_number' => ['required', 'string', 'digits:16', Rule::exists('users', 'cardNumber')->where(function ($query) {
                $query->where('vendor_id', auth()->user()->id);
            })],
        ];
        
        $validator = Validator::make($data, $rules, []);
        
		if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 200);
        }
        try {
            $user = User::where('cardNumber', $card_number)->first();
            if(!empty($user)){
                $response['card_number'] = "Card Is valid";
                 
                return response()->json(['success' => $response], 200); 
            }

            return response()->json(["error" => "Unable to fetch user details!"], 401);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
	
	
	
	public function loadCardsDetails(){
        $data = $this->request->all();
		//die("here");
        try {
			
			$loadCards = DB::table('loadcard')->select('*')->join('users', 'users.id', '=', 'loadcard.userId')->where('loadcard.created_at', '>=', $data['loaded_from'])->where('loadcard.loaded_at', '<=', $data['loaded_to'])->get();
			
            $response = [];
            if(!$loadCards->isEmpty()){
                foreach($loadCards as $key => $loadCard){
                    $response[$key]['id'] = $loadCard->id;
                    $response[$key]['amount'] = $loadCard->amount;
                    $response[$key]['load_fee'] = $loadCard->cardLoadFee;
                    $response[$key]['loaded_at'] = $loadCard->loaded_at;
                    $response[$key]['to'] = $loadCard->cardNumber;
                }
                return response()->json($response, 200);
            }

            return response()->json(["error" => "No records found!"], 401);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
	

}
