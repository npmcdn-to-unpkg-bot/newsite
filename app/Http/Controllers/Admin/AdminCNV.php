<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cnv;

use Auth;
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

        if (Auth::check()){

            return view('admin.create');
        }

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

        if (Auth::check()){

            $allCnv = $cnvModel->getAllCnv();

            return view('admin.view')->withCvn($allCnv);
        }
    }

    //===========================
    //method regedit cvs
    //===========================
    protected function regedit(Cnv $cnvModel, $id){

        if (Auth::check()){

            $oneCnv = $cnvModel->getOneCnv($id);

            return view('admin.update')->withCvn($oneCnv);
        }
    }

    //===========================
    //method update cvs
    //===========================
    protected function update(Cnv $cnvModel, Request $request){

        $data['id_cnv'] = $request->input('id');
        $data['jsn_cnv'] = $request->input('jsn');
        $data['name_cnv'] = $request->input('name');

        echo $cnvModel->upCnv($data);
    }

    //===========================
    //method delete cvs
    //===========================
    protected function delete(Cnv $cnvModel, $id){

        $cnvModel->delCnv($id);
        return redirect()->back();
    }

}
