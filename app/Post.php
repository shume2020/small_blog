<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected  $fillable=[

        'catagory_id',
        'photo_id',
        'title',
        'body'
    ];
    //
}
