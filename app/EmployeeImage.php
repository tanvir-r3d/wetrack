<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeImage extends Model
{
    protected $table="employee_images";
    protected $primaryKey="emp_image_id";
    public $fillable=[
        'emp_id',
        'emp_img'
    ];

} 
 