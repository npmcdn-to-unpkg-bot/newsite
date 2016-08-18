<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cnv;
use App\Models\Cart;
use App\Models\Categories;
use App\Models\SizePriceCanvas;


use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AdminCNV extends Controller{

    //method boot load
    public function __construct(Cart $cartModel){
        if (Auth::check()){

            $allCart = $cartModel->getAllCnvCart(Auth::user()->id);

            return view()->share('cart', $allCart->count());
        }
    }

    //===========================
    //method create cvs
    //===========================
    protected function create(Categories $catModel, SizePriceCanvas $rpsizeModel, Cart $cartModel){

        if (Auth::check()){

            $prsize = $rpsizeModel->getAllPriceSize();

            $firstPrSize = $rpsizeModel->getFirstPriceSize();

            $cats = $catModel->getAllCat();

            return view('admin.create')->withCat($cats)->withPrsize($prsize)->withFirstprsize($firstPrSize);

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
        $data['id_pr_size'] = $request->input('id_pr_size');

        echo $cnvModel->addCnv($data);
    }

    //===========================
    //method storage cart cvs
    //===========================
    protected function storageCart(Cart $cartModel, Request $request){

        $data['id_cnv'] = $request->input('id_cnv');
        $data['id_user'] = Auth::user()->id;

        echo $cartModel->addCnvCart($data);
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
    //method view cart my cvs
    //===========================
    protected function getCart(Cart $cartModel){

        if(Auth::check()){

            $allCart = $cartModel->getAllCnvCart(Auth::user()->id);

            $cartPrice = 0;

            foreach ($allCart as $iCart) {
                
                $cartPrice += $iCart->price;
            }

            return view('admin.cart')->withCvn($allCart)->withPrice($cartPrice);

        }else{

            return redirect()->back();
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
    protected function regedit(Cnv $cnvModel, Categories $catModel, Cart $cartModel, SizePriceCanvas $rpsizeModel, $id){

        if (Auth::check()){

            $cats = $catModel->getAllCat();

            $oneCnv = $cnvModel->getOneUserCnv($id, Auth::user()->id);

            $prsize = $rpsizeModel->getAllPriceSize();

            $nowCat = $oneCnv->toArray()[0]['id_cat'];

            return view('admin.update')->withCvn($oneCnv)->withCat($cats)->withNowcat($nowCat)->withPrsize($prsize);
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
        $data['id_pr_size'] = $request->input('id_pr_size');
        $data['id_user'] = Auth::user()->id;

        echo $cnvModel->upCnv($data);
    }

    //===========================
    //method delete cvs
    //===========================
    protected function delete(Cart $cartModel, Cnv $cnvModel, $id){

        $cnvModel->delCnv($id);
        $cartModel->deleteCnvCart($id);

        return redirect()->back();
    }

    //===========================
    //method delete cvs
    //===========================
    protected function deleteCart(Cart $cartModel, $id){

        if (Auth::check()){

            $cartModel->delMyCart($id);
        }

        return redirect()->back();
    }

    //===========================
    //method settings site
    //===========================
    protected function getSettings(){

        if (Auth::check()){
            
            return view('admin.settings');
            
        }else{

            return redirect()->back();
        }

    }

    //===========================
    //method settings size and price
    //===========================
    protected function getSizePrice(SizePriceCanvas $rpsizeModel){

        if (Auth::check()){

            $prsize = $rpsizeModel->getAllPriceSize();
            
            return view('admin.sizeprice')->withPrsize($prsize);
            
        }else{

            return redirect()->back();
        }

    }

    //===========================
    //method settings categories
    //===========================
    protected function getCatSettings(Categories $catModel){

        if (Auth::check()){

            $allCat = $catModel->getAllCat();
            
            return view('admin.categories')->withCat($allCat);
            
        }else{

            return redirect()->back();
        }

    }

    //===========================
    //method settings allorders
    //===========================
    protected function getAllOrder(){

        if (Auth::check()){
            
            return view('admin.allorders');
            
        }else{

            return redirect()->back();
        }

    }

//end class
}
