<?php

namespace App;

use App\Traits\Datatableable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class EmployeeCategory extends Model
{
    use Datatableable;
    use Searchable;

    protected $table = "employee_categorys";
    protected $primaryKey = "emp_cat_id";
    public $fillable = ['emp_cat_name' , 'emp_cat_detils'];

    public function validation ()
    {
        return [
            'name' => 'required',
        ];
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $data = [
            'name' => $array['emp_cat_name'],
            'details' => $array['emp_cat_detils'],
            'link' => '/employeeCategorys'
        ];

        return $data;
    }
}
