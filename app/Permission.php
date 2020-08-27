<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Datatableable;

class Permission extends Model
{
    use Datatableable;
    protected $table="permissions";
    public $fillable=['name','guard_name'];




    public function validation(){
        return[

            'name'=>'required',
           
        ];
    }
}
