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

}
