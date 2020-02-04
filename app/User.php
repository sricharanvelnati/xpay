<?php

namespace App;

use App\Models\UserKYCDetails;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'first_name', 'last_name', 'company_name', 'email', 'dob', 'nationality', 'passport_id','pep', 'maiden_name', 'password','contactNumber','countryCode','countryName','cardCount','google2fa_enable','google2fa_secret',
        'google2fa_qr','cardNumber','urnNumber','cardStatus','status','appid','is_kyc_approved','kycres','balance_usd','balance_btc','balance_eth','address1','address2','city','state','pincode','d_country','is_kyc_details','inspectionId', 'vendor_id', 'img_sign','partner_fee'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
       return $this->belongsTo('App\Models\Role');
    }
    
    public function roles()
    {
       return $this->belongsToMany('App\Models\Role');
    }
   public static function users()
   {
       return static::leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
           ->where('role_user.role_id',2);
   }
   
   public function attachments()
   {
       return $this->hasMany(UserKYCDetails::class);
   }
   
   public function vendor()
   {
       return $this->belongsTo(User::class,  'vendor_id')->withDefault();
   }
}
