<?php

namespace App;

use App\Traits\Datatableable;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use Datatableable;
    protected $table="companies";
    protected $primaryKey="com_id";
    public $fillable=[
      'com_name',
      'com_logo',
      'com_details',
    ];

    public function validation(){
        return[
          'name'=>'required',
          'logo'=>'mimes:png',
      ];
    }
}
