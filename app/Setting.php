<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = "settings";
    protected $primaryKey = "setting_id";
    public $fillable = ['site_title' , 'site_logo','site_favicon','site_mail'];

}
