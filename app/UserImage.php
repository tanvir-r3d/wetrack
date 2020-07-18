<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    protected $table="user_images";
    protected $primaryKey="user_image_id";
    public $fillable=[
        'user_id',
        'user_img'
    ];
}
