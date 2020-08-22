<?php

namespace App;

use App\Traits\Datatableable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Company extends Model
{
    use Searchable;
    use Datatableable;
    protected $table="companies";
    protected $primaryKey="com_id";
    public $fillable=[
      'com_name',
      'com_logo',
      'com_details',
    ];

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $data = [
            'name' => $array['com_name'],
            'logo' => $array['com_logo'],
            'details' => $array['com_details'],
            'link' => '/company'
        ];

        return $data;
    }


    public function validation(){
        return[
          'name'=>'required',
          'logo'=>'mimes:png',
      ];
    }
}
