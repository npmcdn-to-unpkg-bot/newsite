<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cnv;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AdminCNV extends Controller{

    //===========================
    //method create cvs
    //===========================
    protected function create(){
        return view('admin.create');
    }

    //===========================
    //method storage cvs
    //===========================
    protected function storage(Cnv $cnvModel, Request $request){

        $data['name_cnv'] = $request->input('name');
        $data['jsn_cnv'] = $request->input('jsn');

        echo $cnvModel->addCnv($data);
    }

    //===========================
    //method view cvs
    //===========================
    protected function view(Cnv $cnvModel){

        $allCnv = $cnvModel->getAllCnv();

        return view('admin.view')->withCvn($allCnv);
    }

    //===========================
    //method regedit cvs
    //===========================
    protected function regedit(Cnv $cnvModel, $id){

        $oneCnv = $cnvModel->getOneCnv($id);

        return view('admin.update')->withCvn($oneCnv);
    }
}
