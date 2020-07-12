<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    'emp_phone'
  ];

  public function validation(){
      return[
          'full_name'=>'required',
          'branch_id'=>'required',
          'branch_cat'=>'required',
          'gender'=>'',
          'user_name'=>'required',
          'phone'=>'required',
          'salery'=>'',
          'email'=>'required',
          'image'=>'',
          'password'=>'required',
          'address'=>'required',

      ];














  }

}
