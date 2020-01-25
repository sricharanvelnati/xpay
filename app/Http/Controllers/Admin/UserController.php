<?php

namespace App\Http\Controllers\Admin;

use App\Models\Finexus;
use App\Models\UserKYCDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Zizaco\Entrust\Entrust;
use Validator;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\Mail;
use App\Mail\assignCardMail;
use Redirect, Response, DB, Config;
use PDF;
use URL;

class UserController extends Controller
{
    public function index($vendor_id = '')
    {
        if(auth()->user()->hasRole('vendor') && $vendor_id != auth()->user()->id){
            abort(403);
        }

        $getUsers = User::users();
        if($vendor_id){
            $getUsers = $getUsers->where('vendor_id', $vendor_id);
        }
        $getUsers = $getUsers->get();

        foreach ($getUsers as $row) {
            $row->is_KYC_image = \BaseFunction::checkKYCImage($row->id);
        }
        $is_vendor_wise = ($vendor_id)? true : false;
        return view('Admin.User.index', compact('getUsers', 'is_vendor_wise'));

    }
    // public function userList(){
    //   $users = DB::table('users')->select('*');
    //     return datatables()->of($users)
    //         ->make(true);
    // }

    public function updateUserStatus(Request $request)
    {

        $getStatus = User::where('id', $request->userId)->first();
        $status = $getStatus->status == 'deactive' ? 'active' : 'deactive';
        $data['status'] = $status;
        $updateStatus = User::where('id', $request->userId)->update($data);
        return response()->json($status);
    }
	
	public function updateUserInfo(Request $request){
		
		$data = $request->all();
		DB::table('users')
            ->where('id', $data['userId'] )
            ->update($data['user_data']);
		
		$user = User::where('id', $request->userId)->first();		
	
		$pdf_data['data'] = $data['user_data'];
		$pdf_data['data']['title'] = $user->title;
		$pdf_data['data']['name'] = $data['user_data']['first_name']. ' '.$data['user_data']['last_name'];
        $pdf_data['data']['img_sign'] = URL::to('public/img/sign/' . $user->img_sign);
        $pdf_data['data']['card_no'] = $user->cardNumber;
		$pdf_data['data']['nric_no'] = $user->nric_no;
		$pdf_data['data']['passport_no'] = $user->passport_no;
		$pdf_data['data']['sex'] = $user->sex;
		$pdf_data['data']['nationality'] = $user->nationality;
		$pdf_data['data']['residential_address'] = $user->residential_address;
		$pdf_data['data']['postal_code'] = $user->postal_code;
		$pdf_data['data']['country'] = $user->country;
		$pdf_data['data']['mailing_address'] = $user->mailing_address;
		$pdf_data['data']['mailing_postalcode'] = $user->mailing_postalcode;
		$pdf_data['data']['mailing_state'] = $user->mailing_state;
		$pdf_data['data']['mailing_country'] = $user->mailing_country;
		$pdf_data['data']['c_code'] = $user->c_code;
		$pdf_data['data']['mobile_no'] = $user->mobile_no;
		$pdf_data['data']['security_ans'] = $user->security_ans;
		
		
        $pdf = PDF::loadView('pdf.kyc', $pdf_data);
        $name = $user->id . '-KYC-FINEXUS.pdf';
        $pdf->save('public/img/finexus_kyc/'.$name);
				  
		
			
		    return "done";
			
	}

    public function assignCard(Request $request)
    {

        $rules = [
            'urnNumber' => 'required|unique:users',
            'cardNumber' => 'required|unique:users',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()]);

        } else {

            $getStatus = User::where('id', $request->userId)->first();
            $status = 'assigned';
            $data['cardStatus'] = $status;
            $data['urnNumber'] = $request->urnNumber;
            $data['cardNumber'] = $request->cardNumber;

            $updateStatus = User::where('id', $request->userId)->update($data);
            if ($updateStatus) {
                Mail::to($getStatus->email)->send(new assignCardMail());
            }
            return response()->json($status);

        }
    }

    public function delete(Request $request)
    {
        $user = User::findorFail($request->deleteId);
        if(auth()->user()->hasRole('vendor')){
            if($user->vendor->id !== auth()->user()->id){
                abort(403);
            }
        }
        
        $delete = User::where('id', $request->deleteId)->delete();
        if ($delete) {
            $status = 'deleted';
        } else {
            $status = 'failed';
        }
        return response()->json($status);
    }

    public function getImageForPDF($id)
    {
        $user = User::findorFail($id);
        if(auth()->user()->hasRole('vendor')){
            if($user->vendor->id !== auth()->user()->id){
                abort(403);
            }
        }
        
        $getImages = UserKYCDetails::where('user_id', $id)->get();
        $html = "<h1>" . $user['first_name'] . "  " . $user['last_name'] . "</h1>";
        foreach ($getImages as $row) {
            $image = URL::to('public/img/kyc/' . $row->name);
            $html .= "<img src=" . $image . " style='max-width:1000px;max-height:1000px'>";
        }
        $pdf = PDF::loadHTML($html);
        return $pdf->download($user['id'] . '-KYC-PASSPORT.pdf');

    }

    public function getImageForKycPDF($id)
    {
        $user = User::findorFail($id);
        if(auth()->user()->hasRole('vendor')){
            if($user->vendor->id !== auth()->user()->id){
                abort(403);
            }
        }

        $data = Finexus::where('user_id', $id)->first();
        $data['img_sign'] = URL::to('public/img/sign/' . $data['img_sign']);
        $data['card_no'] = $user['cardNumber'];
        $data['data'] =$data;

        $pdf = PDF::loadView('pdf.kyc', $data);

        return $pdf->download($user['id'] . '-KYC-FINEXUS.pdf');

}
}
