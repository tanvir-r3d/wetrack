<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
class EmployeeImage extends Model
{
    protected $table="employee_images";
    protected $primaryKey="emp_image_id";
    public $fillable=[
        'emp_id',
        'emp_img'
    ];
    // public function employee()
    // {
    //     return $this->belongsTo('Employee', 'emp_id');
    // }
} 
