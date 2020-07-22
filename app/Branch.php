<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table="branches";
    protected $primaryKey="branch_id";
    public $fillable=['branch_name','branch_location','branch_details','com_id'];

    public function validation(){
        return[

            'name'=>'required',
            'location'=>'required'
        ];
    }
}
