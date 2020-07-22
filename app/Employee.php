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
    'emp_com_id',
    'emp_address',
    'emp_phone',
    'emp_img'
  ];

  public function validation(){

      return[
        'full_name'=>'required',
        'branch_id'=>'required',
        'cat_id'=>'required',
        'phone'=>'required',
        'address'=>'required',

    ];


  }


}
