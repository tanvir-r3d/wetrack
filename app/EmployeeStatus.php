<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeStatus extends Model
{ 
    protected $table="employee_statuss";
    protected $primaryKey="emp_status_id";
    public $fillable=['emp_id','emp_status'];
  
}
