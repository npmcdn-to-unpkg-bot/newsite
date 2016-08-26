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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //=====================================
    //method get users
    //=====================================
    public function getUser(){

        return $this->get();
    }

    //=====================================
    //method get admin
    //=====================================
    public function getAdmin(){

        return $this->where('is_admin', 1)->get();
    }

    //=====================================
    //method del user
    //=====================================
    public function delUser($data){

        return $this->where('id', $data['id'])->delete();
    }

}
