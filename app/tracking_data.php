<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tracking_data extends Model
{
    protected $table="tracking_datas";
    protected $primaryKey="tracking_id";
    public $fillable=['tracking_longitude','tracking_latitude','emp_id'];
}
