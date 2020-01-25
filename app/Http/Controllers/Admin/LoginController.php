<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\Role;
use Auth;
use URL;
use Redirect;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function login() {
        $url = URL::to('admin/login-auth');
        return view('Admin.login',compact('url'));
    }
	 public function mlogin() {
        $url = URL::to('merchant/mlogin-auth');
        return view('Admin.login',compact('url'));
    }

    public function login_auth(Request $request) {

        $rules = [
            'username' => 'required|email',
            'password' => 'required'
        ];
        $message = [
            'username.required'  => 'Email is required.',
            'password.required'  => 'Password is required.',
        ];

        $validator = Validator::make($request->all(), $rules,$message);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $username = $request->username;
        $password = $request->password;

        $check_login = User::where('email',$username)->first();

        $logindetails = array(
            'email' => $username,
            'password' => $password,
			'status' => 'active');

        if (Auth::attempt($logindetails)) {
            if (!Auth::user()->hasRole('user')) {
                if (Auth::user()->hasRole('admin')) {
					return Redirect::to('admin/dashboard');
                }
            }
			
		 
            Auth::logout();
           return redirect()->back()->withErrors(['email' => "Only Admin Can Login Here..!"]);
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid Login Details.']);
        }
    }
	
	
	
	public function mlogin_auth(Request $request) {

        $rules = [
            'username' => 'required|email',
            'password' => 'required'
        ];
        $message = [
            'username.required'  => 'Email is required.',
            'password.required'  => 'Password is required.',
        ];

        $validator = Validator::make($request->all(), $rules,$message);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $username = $request->username;
        $password = $request->password;

        $check_login = User::where('email',$username)->first();

        $logindetails = array(
            'email' => $username,
            'password' => $password);

        if (Auth::attempt($logindetails)) {
       		
			if (Auth::user()->hasRole('vendor')) {                     
                    return Redirect::to('admin/dashboard');
                
                }
				else { return redirect()->back()->withErrors(['email' => 'Invalid Login Details.']);} 
            Auth::logout();
           return redirect()->back()->withErrors(['email' => "Only Admin Can Login Here..!"]);
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid Login Details.']);
        }
    }

}
