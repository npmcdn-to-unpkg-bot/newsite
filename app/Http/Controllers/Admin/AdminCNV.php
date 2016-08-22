<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cnv;
use App\Models\Cart;
use App\Models\Categories;
use App\Models\SizePriceCanvas;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Settings;


use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
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
    //method add pr_size
    //===========================
    protected function postAddPrSize(SizePriceCanvas $rpsizeModel, Request $request){

        $valid = Validator::make($request->all(), [

            'add_pr_size_title' => 'required|max:55',
            'add_pr_size_size' => 'required|max:5',
            'add_pr_size_price' => 'required|max:5',
            'add_pr_size_width' => 'required|max:10',
            'add_pr_size_height' => 'required|max:10',

        ]);

        if($valid->fails())
            return redirect()->back()->with('errorsadmin', 'Incorrectly filleds!');

        $data['title'] = $request->input('add_pr_size_title');
        $data['size'] = $request->input('add_pr_size_size');
        $data['price'] = $request->input('add_pr_size_price');
        $data['width'] = $request->input('add_pr_size_width');
        $data['height'] = $request->input('add_pr_size_height');

        $add = $rpsizeModel->addPrSize($data);

        if($add)
            return redirect()->back()->with('successadmin', 'Added one new Price and Size!');
        else
            return redirect()->back()->with('errorsadmin', 'Error!');

        return redirect()->back();
    }

    //===========================
    //method update pr_size
    //===========================
    protected function postUpPrSize(SizePriceCanvas $rpsizeModel, Request $request){

        $valid = Validator::make($request->all(), [

            'up_pr_size_title' => 'required|max:55',
            'up_pr_size_size' => 'required|max:5',
            'up_pr_size_price' => 'required|max:5',
            'up_pr_size_width' => 'required|max:10',
            'up_pr_size_height' => 'required|max:10',

        ]);

        if($valid->fails())
            return redirect()->back()->with('errorsadmin', 'Incorrectly filleds!');

        $data['title'] = $request->input('up_pr_size_title');
        $data['size'] = $request->input('up_pr_size_size');
        $data['price'] = $request->input('up_pr_size_price');
        $data['width'] = $request->input('up_pr_size_width');
        $data['height'] = $request->input('up_pr_size_height');
        $data['id'] = $request->input('up_pr_size_id');

        $up = $rpsizeModel->upPrSize($data);

        if($up)
            return redirect()->back()->with('successadmin', 'Update Price and Size!');
        else
            return redirect()->back()->with('errorsadmin', 'Error!');

    }

    //===========================
    //method delete pr_size
    //===========================
    protected function postDelPrSize(SizePriceCanvas $rpsizeModel, Request $request){

        $data['id'] = $request->input('del_pr_size_id');

        $del = $rpsizeModel->delPrSize($data['id']);

        if($del)
            return redirect()->back()->with('successadmin', 'Deleted Price and Size!');
        else
            return redirect()->back()->with('errorsadmin', 'Error!');
    }

    //===========================
    //method add categories
    //===========================
    protected function postAddCat(Categories $catModel, Request $request){

        $valid = Validator::make($request->all(), [
            'add_cat_title' => 'required|max:55',
        ]);

        if($valid->fails())
            return redirect()->back()->with('errorsadmin', 'Incorrectly filleds!');

        $data['title'] = $request->input('add_cat_title');
        

        if($request->hasFile('add_cat_image') && $request->file('add_cat_image')->isValid()){

            $data['image'] = $request->file('add_cat_image');
            $data['image'] = $data['image']->getClientOriginalName();

            $request->file('add_cat_image')->move(public_path('assets/images/'), $data['image']);



        }else{

            $data['image'] = 'noimage.png';
        }


        $catModel->addCat($data);

        return redirect()->back()->with('successadmin', 'Added one new category!');
    }

    //===========================
    //method update categories
    //===========================
    protected function postUpCat(Categories $catModel, Request $request){

        $valid = Validator::make($request->all(), [
            'up_cat_title' => 'required|max:55',
        ]);

        if($valid->fails())
            return redirect()->back()->with('errorsadmin', 'Incorrectly filleds!');

        $data['title'] = $request->input('up_cat_title');
        $data['id'] = $request->input('up_cat_id');

        if($request->hasFile('up_cat_image') && $request->file('up_cat_image')->isValid()){

            $data['image'] = $request->file('up_cat_image');
            $data['image'] = $data['image']->getClientOriginalName();

            $request->file('up_cat_image')->move(public_path('assets/images/'), $data['image']);



        }else{

            $data['image'] = null;
        }


        $catModel->upCat($data);

        return redirect()->back()->with('successadmin', 'Update category!');
    }

    //===========================
    //method delete categories
    //===========================
    protected function postDelCat(Categories $catModel, Request $request){

        $data['id'] = $request->input('del_cat_id');

        $del = $catModel->delCat($data);

        if($del)
            return redirect()->back()->with('successadmin', 'Delete category!');
        else
            return redirect()->back()->with('errorsadmin', 'Error!');
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

            $allCart = $cartModel->getAllCnvCartOrdered(Auth::user()->id);

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
    protected function getSettings(Slider $sliderModel, Settings $settModel, Social $socModel){

        if (Auth::check()){

            $allSlider = $sliderModel->getAllSliders();
            $logo = $settModel->getLogo();
            $soc = $socModel->getSoc();
            
            return view('admin.settings')->withSlider($allSlider)->withLogo($logo)->withSoc($soc);
            
        }else{

            return redirect()->back();
        }

    }

    //===========================
    //method add slider
    //===========================
    protected function postAddSlider(Slider $sliderModel, Request $request){

        if($request->hasFile('add_slider_image')){

            $data['image'] = $request->file('add_slider_image');
            $data['image'] = $data['image']->getClientOriginalName();

            $request->file('add_slider_image')->move(public_path('assets/images/'), $data['image']);

            $sliderModel->addSlider($data);
        }else{
            return redirect()->back()->with('errorsadmin', 'Error!');
        }

        return redirect()->back()->with('successadmin', 'Added one new image slider!');
    }

    //===========================
    //method update slider
    //===========================
    protected function postUpSlider(Slider $sliderModel, Request $request){

        $data['id'] = $request->input('up_slider_id');

        if($request->hasFile('up_slider_image') && $request->file('up_slider_image')->isValid()){

            $data['image'] = $request->file('up_slider_image');
            $data['image'] = $data['image']->getClientOriginalName();

            $request->file('up_slider_image')->move(public_path('assets/images/'), $data['image']);

            $sliderModel->upSlider($data);
        }

        return redirect()->back()->with('successadmin', 'Update slider!');
    }

    //===========================
    //method delete slider
    //===========================
    protected function postDelSlider(Slider $sliderModel, Request $request){

        $data['id'] = $request->input('del_slider_id');

        $del = $sliderModel->delSlider($data);

        if($del)
            return redirect()->back()->with('successadmin', 'Delete image slider!');
        else
            return redirect()->back()->with('errorsadmin', 'Error!');
    }

    //===========================
    //method update logo
    //===========================
    protected function postUpLogo(Settings $settModel, Request $request){

        $data['id'] = $request->input('up_logo_id');

        if($request->hasFile('up_logo_image') && $request->file('up_logo_image')->isValid()){

            $data['image'] = $request->file('up_logo_image');
            $data['image'] = $data['image']->getClientOriginalName();

            $request->file('up_logo_image')->move(public_path('assets/images/'), $data['image']);

            $settModel->upLogo($data);

            return redirect()->back()->with('successadmin', 'Update slider!');
        }

        return redirect()->back()->with('errorsadmin', 'Error!');
    }

    //===========================
    //method update Social network
    //===========================
    protected function postUpSoc(Social $socModel, Request $request){

        $data['id'] = $request->input('up_soc_id');

        $valid = Validator::make($request->all(), [
            'up_soc_title' => 'required|max:255',
        ]);

        if($valid->fails())
            return redirect()->back()->with('errorsadmin', 'Incorrectly filleds!');

        $data['href'] = $request->input('up_soc_title');

        $socModel->upSoc($data);

        return redirect()->back()->with('successadmin', 'Update!');  
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
    protected function getAllOrder(Cart $cartModel){

        if (Auth::check()){

            $carts = $cartModel->getAllCarts();

            return view('admin.allorders')->withOrders($carts);
            
        }else{

            return redirect()->back();
        }

    }

    //===========================
    //method get status
    //===========================
    protected function getStatus(Cart $cartModel){

        if (Auth::check()){

            $carts = $cartModel->getAllCartsStatus();

            return view('admin.status')->withOrders($carts);
            
        }else{

            return redirect()->back();
        }
    }

    //===========================
    //method add orders
    //===========================
    protected function postAddOrders(Cart $cartModel, Request $request){

        $data['id'] = $request->input('add_orders_user_id');

        if(true){

            $addOrdered = $cartModel->addOrdered($data);

            if($addOrdered)
                return redirect()->back()->with('successadmin', 'Order successfull!');
            else
                return redirect()->back()->with('errorsadmin', 'Error!');

        }else{
            return redirect()->back()->with('errorsadmin', 'Error!');
        }

    }

//end class
}
