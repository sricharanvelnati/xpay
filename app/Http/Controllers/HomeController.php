<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\Role;
use App\Models\Plan;
use App\User;
use \ParagonIE\ConstantTime\Base32;
use \PragmaRX\Google2FA\Google2FA;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth','verified']);
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $getPlan = Plan::where('status','active')->get();
        return view('Frontend.home',compact('getPlan'));
    }

public function showChangePasswordForm(){
   return view('auth.changepassword');
}
  public function changePassword(Request $request){
     if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
         // The passwords matches
         return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
     }
     if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
         //Current password and new password are same
         return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
     }
     $validatedData = $request->validate([
         'current-password' => 'required',
         'new-password' => 'required|string|min:8|confirmed',
     ]);
     //Change Password
     $user = Auth::user();
     $user->password = bcrypt($request->get('new-password'));
     $user->save();
     Auth::logout();
     return redirect('/')->with("success","Password changed successfully...!");
  }
  public function show2faForm(Request $request){

    $user = Auth::user();
    if($user->google2fa_secret == ''){

        $secret = $this->generateSecret();
        $google = new Google2FA();
        $imageDataUri = $google->getQRCodeInline(
            "X-pay",
            $user->email,
            $secret,
            200
        );

      $update = User::where('id',$user->id)->update([
        'google2fa_enable' => 0,
        'google2fa_secret' => $secret,
        'google2fa_qr' => $imageDataUri
      ]);

    } else {

      $secret = $user->google2fa_secret;
      $imageDataUri = $user->google2fa_qr;

    }
        $data = array(
            'user' => $user,
            'secret' => $secret,
            'google2fa_url' => $imageDataUri
        );
        return view('auth.2fa')->with('data', $data);
    }

   public function enable2fa(Request $request){
          $user = Auth::user();
          $sec = $user->google2fa_secret;
          $optp = $request->input('verify-code');
          $google = new Google2FA();
          $valid = $google->verifyKey($sec,$optp);
          if($valid){
              $user->google2fa_enable = 1;
              $user->save();
              return redirect('2fa')->with('success',"2FA is Enabled Successfully.");
          }else{
              return redirect('2fa')->with('error',"Invalid Verification Code, Please try again.");
          }
      }
   public function disable2fa(Request $request){
            if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
                // The passwords matches
                return redirect()->back()->with("error","Your  password does not matches with your account password. Please try again.");
            }

            $validatedData = $request->validate([
                'current-password' => 'required',
            ]);
            $user = Auth::user();
            $user->google2fa_enable = 0;
            $user->save();
            return redirect('/2fa')->with('success',"2FA is now Disabled.");
        }
    private function generateSecret()
        {
            $randomBytes = random_bytes(10);

            return Base32::encodeUpper($randomBytes);
        }
       public function logout(){
           Auth::logout();
           return Redirect('/');
        }
}
