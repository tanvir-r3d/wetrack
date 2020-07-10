<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeCategory extends Model
{
  protected $table="employee_categorys";
  protected $primaryKey="emp_cat_id";
  public $fillable=['emp_cat_name','emp_cat_detils'];

  public function validation(){
      return[
          'name'=>'required'
      ];
  }
}
