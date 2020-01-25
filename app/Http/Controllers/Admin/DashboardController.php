<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use App\Models\Contactus;
use App\Models\Loadcard;
use App\Models\Payment;
use DB;
use Auth;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index(Request $request) {

        $idd=Auth::user()->id; 
		// print_r($idd);
		if($idd==1) {$totalUser = User::users()->count();}
		else {$totalUser = User::users()->where('vendor_id',$idd)->count(); }
        $totalCardPurchase = Payment::count();
        $totalCardLoad = Loadcard::sum('amount');
        $totalCardLoadEarn = Loadcard::where('status','confirm')->sum('partnerFee');
        return view('Admin.dashboard',compact('totalUser','totalCardPurchase','totalCardLoad','totalCardLoadEarn'));
    }

    public function contactus(Request $request) {
      $getContact = Contactus::all();
      return view('Admin.Contact.index',compact('getContact'));
    }

    public function response(Request $request){

      $rules = [
          'response' => 'required',
          'response_imagefile' => 'nullable|mimes:jpeg,jpg,png,pdf,txt',
          'contactId' => 'required|numeric'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }

        if($request->hasFile('response_imagefile')){
           $file = $request->file('response_imagefile');
           $filename = 'Contact'. '-' . uniqid() . '.' . $file->getClientOriginalExtension();
           $file->move(public_path('img/contact/replay/'), $filename);
           $data['response_imagefile'] = $filename;
           }

         $data['response'] = $request->response;
         $data['status'] = 'replied';

        $updateResponse = Contactus::where('id',$request->contactId)->update($data);

        if($updateResponse){
          $getDetails = Contactus::where('id',$request->contactId)->first();

        if($request->hasFile('response_imagefile')){
          $path = public_path().'/img/contact/replay/'.$getDetails->response_imagefile;
          $datas = array('response' => $request->response);

          Mail::send('emails.ContactResponse',$datas,function($message) use($getDetails){
            $message->to($getDetails->email,$getDetails->name)->subject('Response Of your inquiry.');
            $message->attach(public_path().'/img/contact/replay/'.$getDetails->response_imagefile);
            $message->from('admin@x-pay.vip','X-PAY.VIP');
          });

        } else {
          $datas = array('response' => $request->response);
          Mail::send('emails.ContactResponse',$datas,function($message) use($getDetails){
            $message->to($getDetails->email,$getDetails->name)->subject('Response Of your inquiry.');
            $message->from('admin@x-pay.vip','X-PAY.VIP');
          });
        }
          return response()->json($data);
        } else {
          return false;
        }
    }
}
