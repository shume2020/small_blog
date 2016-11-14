<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','is_active','photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){

        return $this->belongsTo('App\Role');
    }
    public  function photo(){

        return $this->belongsTo('App\Photo');

    }

    public  function isAdmin(){
        //echo $this->role_id;
        // role_id 1;admin,
        //if ($this->role_id === 2 && $this->is_active === 1) {
        if ($this->role_id === 1 && $this->is_active == 1) {
           // echo $this->role_id;
           // echo "admin";
            return true;
        } else {

             return false;
             //echo "not";
         }
    }


    public function posts(){



        return $this->hasMany('App\Post');
    }

//    public function getGravatarAttribute(){
//
//        $hash = md5(strtolower(trim($this->attributes['email'])));
//        return "http:/en.gravatar.com/emails/$hash";
//
//
//
//
//    }
}
