<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Employee extends Model
{
    use Searchable;



    protected $table="employees";
    protected $primaryKey="emp_id";
    public $fillable=[
    'emp_full_name',
    'emp_branch_id',
    'emp_cat_id',
    'emp_salery',
    'emp_gender',
    'emp_com_id',
    'emp_address',
    'emp_phone',
    'emp_status',
    'emp_img'
    ];

  public function validation(){
      return[
        'full_name'=>'required',
        'branch_id'=>'required',
        'cat_id'=>'required',
        'com_id'=>'required',
        'phone'=>'required',
        'gender'=>'required',
        'address'=>'required',
        'image'=>'image|max:2048',
        'password' => 'required|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/|min:6',
        'retypePassword' => 'required|same:password',
        'username' => 'required|unique:users,username',
        'email' => 'required|unique:users,email',
    ];
  }

  public function fieldName()
  {
        return [
        'full_name'=>'Full Name',
        'branch_id'=>'Branch',
        'cat_id'=>'Category',
        'phone'=>'Phone',
        'address'=>'Address',
        'password' => 'Password',
        'retypePassword' => 'Retype Password',
        'username' => 'Username',
        'email' => 'Email Address',
       ];
  }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $data = [
            'name' => $array['emp_full_name'],
            'details' => $array['emp_address'],
            'phone' => $array['emp_phone'],
            'link' => '/employee'
        ];

        return $data;
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

}
