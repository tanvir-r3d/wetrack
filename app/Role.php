<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Datatableable;

class Role extends Model
{

    use Datatableable;
    protected $table="roles";
    public $fillable=['name','guard_name '];




    public function validation(){
        return[

            'name'=>'required',
            'guard_name'=>'required'
        ];
    }
}
