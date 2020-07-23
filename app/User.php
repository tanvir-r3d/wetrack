<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Rules\MatchOldPassword;
use Auth;
use Hash;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','user_first_name','user_type','emp_id','user_last_name','user_gender','user_contact','user_img'
    ];

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

    public function passValidate()
    {
         return [
            'old_pass' => ['required',new MatchOldPassword],
            'new_pass' => ['required|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/g','min:6'],
            'retype_pass' => ['same:new_pass'],
        ];
    }

    public function fieldName()
    {
        return [
        'old_pass' => 'Current Password',
        'new_pass' => 'New Password',
        'retype_pass' => 'Retype Password',
       ];
    }

    public function generalValidate()
    {
         return [
            'username' => 'required','string','max:255','unique:users,username,'.Auth::user()->id,
            'first_name' => 'required', 'string', 'max:255',
            'gender' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id];
    }

}
