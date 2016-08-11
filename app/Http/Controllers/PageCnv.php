<?php

namespace App\Http\Controllers;

use App\Models\Cnv;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageCnv extends Controller{
    

    //===========================
    //method views all cvs
    //===========================
    protected function views(Cnv $cnvModel){

            $allCnv = $cnvModel->getAllCnv();

            return view('views')->withCvn($allCnv);
    }

    //===========================
    //method view one cvs
    //===========================
    protected function view(Cnv $cnvModel, $id){

            $oneCnv = $cnvModel->getOneCnv($id);

            return view('view')->withCvn($oneCnv);
    }

}
