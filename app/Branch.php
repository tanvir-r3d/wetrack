<?php

namespace App;

use App\Traits\Datatableable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Branch extends Model
{
    use Searchable;
    use Datatableable;
    protected $table="branches";
    protected $primaryKey="branch_id";
    public $fillable=['branch_name','branch_location','branch_details','com_id'];

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $data = [
            'name' => $array['branch_name'],
            'logo' => '',
            'details' => $array['branch_details'],
            'link' => '/branch'
        ];

        return $data;
    }


    public function validation(){
        return[

            'name'=>'required',
            'location'=>'required'
        ];
    }
}
