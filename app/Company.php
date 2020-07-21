<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table="companies";
    protected $primaryKey="com_id";
    public $fillable=[
      'com_name',
      'com_logo',
      'com_details',
    ];
  
    public function validation(){      
        return[
          'com_name'=>'required',
      ];
        
    }
}
