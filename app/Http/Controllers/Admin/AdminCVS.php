<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AdminCVS extends Controller{

    //method create cvs
    protected function create(){
        return view('admin.create');
    }
}
