<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '2fa';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if (app()->getLocale() == 'en') {
            $message = [
                'first_name.required' =>'The first name is required.',
                'first_name.string' =>'The first name must be a string.',
                'first_name.max' =>'The first name may not be greater than 255 characters.',
                'last_name.required' =>'The last name is required.',
                'last_name.string' =>'The last name must be a string.',
                'last_name.max' =>'The last name may not be greater than 255 characters.',
                'email.required' =>'The email is required.',
                'email.string' =>'The email must be a string.',
                'email.email' =>'The email must be a valid email address.',
                'email.max' =>'The email may not be greater than 255 characters.',
                'email.unique' =>'The email has already been taken',
                'password.required' =>'The password is required.',
                'password.string' =>'The password must be a string.',
                'password.min' =>'The password must be at least 8 characters',
                'password.confirmed' =>'The password confirmation does not match',
                'contactNumber.required' =>'The contact number is required.',
                'countryCode.required' =>'Please select Mobile number country code.',
                'contactNumber.numeric' =>'The Contact number must be a number.',
                'contactNumber.integer' =>'The Contact number must be a number.',
                'address1.required' =>'The address1 is required.',
                'city.required' =>'The city is required.',
                'state.required' =>'Country State is required.',
                'pincode.required' =>'The Postal code is required',
                'pincode.numeric' =>'The Postal code must be a number.',
                'd_country.required' =>'The Country name required.',
                'd_country.alpha' =>'The Country name may only contain letters.',
                ];
        } else {
            $message = [
                'first_name.required' =>'名字是必需的。',
                'first_name.string' =>'名字必须是一个字符串。',
                'first_name.max' =>'名字不得超过255个字符。',
                'last_name.required' =>'必须输入姓氏。',
                'last_name.string' =>'姓氏必须是字符串。',
                'last_name.max' =>'姓氏不能超过255个字符。',
                'email.required' =>'该电子邮件为必填项。',
                'email.string' =>'电子邮件必须是字符串。',
                'email.email' =>'该电子邮件必须是有效的电子邮件地址。',
                'email.max' =>'电子邮件不得超过255个字符。',
                'email.unique' =>'电子邮件已经被拿走',
                'password.required' =>'密码为必填项。',
                'password.string' =>'密码必须是字符串。',
                'password.min' =>'密码必须至少8个字符',
                'password.confirmed' =>'密码确认不匹配',
                'contactNumber.required' =>'联系电话为必填项。',
                'contactNumber.numeric' =>'联系人号码必须是一个数字。',
                'contactNumber.integer' =>'联系人号码必须是一个数字。',
                'address1.required' =>'地址1是必需的。',
                'countryCode.required' =>'请选择手机号的国家代码',
                'city.required' =>'必须填写城市。',
                'state.required' =>'居住国家必须填写',
                'pincode.required' =>'邮政编码为必填项',
                'pincode.numeric' =>'邮政编码必须是数字。',
                'd_country.required' =>'国家名称为必填项。',
                'd_country.alpha' =>'国家名称只能包含字母。',
            ];
        }
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contactNumber' => ['required','numeric','integer'],
            'countryCode' => ['required','numeric'],
//            'countryName' => ['required'],
            'address1' => ['required'],
            'address2' => ['nullable'],
            'city' => ['required'],
            'state' => ['required'],
            'pincode' => ['required','numeric'],
            'd_country' => ['required','alpha']
        ],$message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $data['password'] = Hash::make($data['password']);
        $register = new User();
        $register->fill($data);

    if($register->save()){

      $setRole = DB::table('role_user')->insert(['user_id' => $register->id,'role_id' => 2]);
      $response = $register->first_name.'_'.$register->last_name;
      Mail::to($data['email'])->send(new RegistrationMail($response));

     }
      return $register;

    }
}
