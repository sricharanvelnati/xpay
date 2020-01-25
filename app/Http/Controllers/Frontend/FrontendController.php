<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contactus;
use App\Models\Plan;
use Validator;
use Auth;
use App\User;
use App\Helpers\BaseFunction\BaseFunction;

class FrontendController extends Controller
{
    public function home(){

      $getPlan = Plan::where('status','active')->get();
      return view('Frontend.home',compact('getPlan'));

    }
    public function login(Request $request){

      if(!Auth::check()) {
      return view('Frontend.login');
        } else {
      return redirect('/');
        }

    }
    public function signup(Request $request){
      if(!Auth::check()) {
      return view('Frontend.register');
      } else {
    return redirect('/');
      }
    }

    public function about(){
      return view('Frontend.aboutus');
    }
	
	public function apiDoc(){
      return view('Frontend.api');
    }
	
    public function terms(){
      return view('Frontend.terms');
    }

    public function privacy()
    {
        return view('Frontend.privacy');
    }

    public function contactUsCreate(Request $request){

      return view('Frontend.contactus');

    }

    public function contactUsStore(Request $request){

      $rules = [
          'name' => 'required',
          'email' => 'required|email',
          'message' => 'required',
          'imagefile' => 'nullable|mimes:jpeg,jpg,png,pdf,txt',
          'countryCode' => 'required|numeric',
          'countryName' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }
        $data = $request->all();

        if($request->hasFile('imagefile')){

           $file = $request->file('imagefile');
           $filename = 'Contact'. '-' . uniqid() . '.' . $file->getClientOriginalExtension();
           $file->move(public_path('img/contact/receive/'), $filename);
            $data['imagefile'] = $filename;
        }

         $contactus = new Contactus();
         $contactus->fill($data);

       if($contactus->save()){
          if(app()->getLocale() == 'en'){
              return redirect('/')->with('message','Your Contact Us Detail Submitted Successfully...!');
          } else {
              return redirect('/')->with('message','您的联系我们详细提交成功......！');
          }
      }
    }

    public function profile(){
    return view('Frontend.profile');
}

public function storeProfile(Request $request){


  $rules = [
    'first_name' => 'required',
    'last_name' => 'required',
    'contactNumber' => 'required|numeric|unique:users,contactNumber,'.Auth::User()->id,
    'countryCode' => 'required|numeric',
    'countryName' => 'required',
    'address1' => 'required',
    'address2' => 'nullable',
    'city' => 'required',
    'state' => 'required',
    'pincode' => 'required|numeric',
    'd_country' => 'required',
  ];

  $validator = Validator::make($request->all(), $rules,
  [ 'pincode.required' => 'The Postal code must be a number.',
    'd_country.required' => 'Country name required.'
   ]
    );

  if ($validator->fails()) {
      return redirect()->back()
          ->withInput()
          ->withErrors($validator);
  }

  $update = User::where('id',Auth::user()->id)->update([
    'first_name' => $request->first_name,
    'last_name' => $request->last_name,
    'contactNumber' => $request->contactNumber,
    'countryCode' => $request->countryCode,
    'countryName' => $request->countryName,
    'address1' => $request->address1,
    'address2' => $request->address2,
    'city' => $request->city,
    'state' => $request->state,
    'pincode' => $request->pincode,
    'd_country' => $request->d_country,
  ]);

  if(app()->getLocale() == 'en'){
      return redirect('/')->with('message','Your Profile update successfully...!');
  } else {
      return redirect('/')->with('message','您的个人资料更新成功...！');
  }
}



public function frontlogout(){
    Auth::logout();
    return Redirect('/');
 }
 public function kyc_callback(Request $request){

   if($request['reviewResult']['reviewAnswer'] == 'GREEN'){

     $data['is_kyc_approved'] = '1';
     $data['appid'] = $request['applicantId'];
     $data['inspectionId'] = $request['inspectionId'];
     $updateStatus = User::where('id',$request['externalUserId'])->update($data);    

   }

   if($request['reviewResult']['reviewAnswer'] == 'RED'){

       $comment = $request['reviewResult']['moderationComment'];
       $type = $request['reviewResult']['reviewRejectType'];
       $rl = $request['reviewResult']['rejectLabels'];
       $rejectLabels = implode(",",$rl);
       $final_string = $comment."#@#".$type."#@#".$rejectLabels;

       $data1['kycres'] = $final_string;
       $data1['appid'] = $request['applicantId'];
       $data1['inspectionId'] = $request['inspectionId'];
       $data1['is_kyc_approved'] = '0';
       $updateReason = User::where('id',$request['externalUserId'])->update($data1);

   }

 }

}
