<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
 protected $fillable=[


     'file','id'

 ];


    //
    public  function posts(){

        return $this->belongsTo('App\Post');
    }

    public  function users(){

        return $this->belongsTo('App\User');
    }
}
