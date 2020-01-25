<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    // protected $redirectTo = '/';

    public function redirectTo(){
      if(Auth::user()->status == 'deactive'){
           Auth::logout();
          session()->flash('message', 'Login error, please contact website support.');
          return 'login';
      } elseif(Auth::user()->email_verified_at != null && Auth::user()->google2fa_enable == 0){
          return '2fa';
      } elseif(Auth::user()->email_verified_at != null && Auth::user()->google2fa_enable == 1 && Auth::user()->is_kyc_approved == 0) {
          return 'card/kyc';
      } elseif(Auth::user()->email_verified_at != null && Auth::user()->google2fa_enable == 1 && Auth::user()->is_kyc_approved == 1 && Auth::user()->cardStatus == 'unpaid') {
          return 'card/card-policy';
      } elseif(Auth::user()->email_verified_at != null && Auth::user()->google2fa_enable == 1 && Auth::user()->is_kyc_approved == 1 && (Auth::user()->cardStatus == 'paid' || Auth::user()->cardStatus == 'assigned' || Auth::user()->cardStatus == 'pending')) {
          return 'card/verify';
      } else {
        return 'card/dashboard';
      }

    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


}
