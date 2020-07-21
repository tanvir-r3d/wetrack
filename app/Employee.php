<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EmployeeImage;

class Employee extends Model
{

  protected $table="employees";
  protected $primaryKey="emp_id";
  public $fillable=[
    'emp_full_name',
    'emp_branch_id',
    'emp_cat_id',
    'emp_salery',
    'emp_gender',
    'emp_username',
    'emp_email', 
    'emp_password',
    'emp_address',
    'emp_phone',
    'emp_image'
  ];

  public function validation(){
    if('id'){
      return[
        'full_name'=>'required',
        'branch_id'=>'required',
        'cat_id'=>'required',
        'user_name'=>"required",
        'phone'=>'required',
        'email'=>"required",
        'address'=>'required',

    ];
    }
    else{
      return[
        'full_name'=>'required',
        'branch_id'=>'required',
        'cat_id'=>'required',
        'user_name'=>'required|unique:employees',
        'phone'=>'required',
        'email'=>'required|unique:employees',
        'password'=>'required',
        'address'=>'required',
    ];
    }
      
  }
    // public function image()
    // {
    //   return $this->hasMany('EmployeeImage', 'emp_id');
    // }

}
