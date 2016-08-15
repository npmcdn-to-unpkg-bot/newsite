<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cnv;
use App\Models\Categories;

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
    protected function create(Categories $catModel){

        if (Auth::check()){

            $cats = $catModel->getAllCat();

            return view('admin.create')->withCat($cats);
        }else{
            return redirect()->back();
        }

    }

    //===========================
    //method storage cvs
    //===========================
    protected function storage(Cnv $cnvModel, Request $request){

        $data['name_cnv'] = $request->input('name');
        $data['jsn_cnv'] = $request->input('jsn');
        $data['ch_public'] = $request->input('public');
        $data['id_cat'] = $request->input('id_cat');
        $data['id_user'] = Auth::user()->id;

        echo $cnvModel->addCnv($data);
    }

    //===========================
    //method add to my cvs
    //===========================
    protected function add(Cnv $cnvModel, $id){
        if(Auth::check()){

            $cnvModel->addMyCnv($id, Auth::user()->id);
            return redirect('/admin/mycnv');

        }else{

            return redirect('/auth/login');
        }
    }

    //===========================
    //method view cvs
    //===========================
    protected function myview(Cnv $cnvModel){

        if (Auth::check()){

            $myAllCnv = $cnvModel->getAllUserCnv(Auth::user()->id);

            return view('admin.view')->withCvn($myAllCnv);
        }else{
            return redirect()->back();
        }
    }

    //===========================
    //method regedit cvs
    //===========================
    protected function regedit(Cnv $cnvModel, Categories $catModel, $id){

        if (Auth::check()){

            $cats = $catModel->getAllCat();

            $oneCnv = $cnvModel->getOneUserCnv($id, Auth::user()->id);

            $nowCat = $oneCnv->toArray()[0]['id_cat'];

            return view('admin.update')->withCvn($oneCnv)->withCat($cats)->withNowcat($nowCat);
        }
    }

    //===========================
    //method update cvs
    //===========================
    protected function update(Cnv $cnvModel, Request $request){

        $data['id_cnv'] = $request->input('id');
        $data['jsn_cnv'] = $request->input('jsn');
        $data['name_cnv'] = $request->input('name');
        $data['ch_public'] = $request->input('public');
        $data['id_cat'] = $request->input('id_cat');
        $data['id_user'] = Auth::user()->id;

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
