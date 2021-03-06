<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cnv;
use App\Models\Cart;
use App\Models\Categories;
use App\Models\SizePriceCanvas;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Settings;
use App\Models\Sub;
use App\Models\QandA;
use App\Models\Material;
use App\Models\Hanger;
use App\Models\Component;
use App\Models\Menu;
use App\User;

use Mail;
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
    protected function create(Material $matModel, Hanger $hanModel, Categories $catModel, SizePriceCanvas $rpsizeModel, Cart $cartModel){

        if (Auth::check()){

            $prsize = $rpsizeModel->getAllPriceSize();

            $firstPrSize = $rpsizeModel->getFirstPriceSize();

            $cats = $catModel->getAllCat();

            $allMat = $matModel->getMat();

            $allHan = $hanModel->getHan();

            return view('admin.create')
                        ->withCat($cats)
                        ->withPrsize($prsize)
                        ->withFirstprsize($firstPrSize)
                        ->withMat($allMat)
                        ->withHan($allHan);

        }else{

            return redirect()->back();
        }

    }

    //===========================
    //method create quickly cvs
    //===========================
    protected function createQ(Material $matModel, Hanger $hanModel, Cnv $cnvModel, Categories $catModel, Cart $cartModel, SizePriceCanvas $rpsizeModel, $id, $size, $hanger, $material){

            $cats = $catModel->getAllCat();

            $oneCnv = $cnvModel->getOneQCnv($id);

            $prsize = $rpsizeModel->getAllPriceSize();

            $allHan = $hanModel->getHan();

            $nowCat = $oneCnv->toArray()[0]['id_cat'];
            $nowMat = $material;
            $nowHan = $hanger;
            $nowPrSize = $size;

            $allMat = $matModel->getMat();

            return view('admin.createq')
                        ->withCvn($oneCnv)
                        ->withCat($cats)
                        ->withNowcat($nowCat)
                        ->withPrsize($prsize)
                        ->withNowprsize($nowPrSize)
                        ->withMat($allMat)
                        ->withNowmat($nowMat)
                        ->withHan($allHan)
                        ->withNowhan($nowHan)
                        ->withIdcnv($id)
                        ->with($id);

    }

    //===========================
    //method get prepair
    //===========================
    protected function getPrepair(Material $matModel, SizePriceCanvas $rpsizeModel, Hanger $hanModel){

        $prsize = $rpsizeModel->getAllPriceSize();

        $firstPrSize = $rpsizeModel->getFirstPriceSize();

        $allMat = $matModel->getMat();

        $allHan = $hanModel->getHan();

        return view('admin.prepair')
                    ->withPrsize($prsize)
                    ->withFirstprsize($firstPrSize)
                    ->withMat($allMat)
                    ->withHan($allHan);

    }

    //===========================
    //method regedit cvs
    //===========================
    protected function regedit(Material $matModel, Hanger $hanModel, Cnv $cnvModel, Categories $catModel, Cart $cartModel, SizePriceCanvas $rpsizeModel, $id){

        if (Auth::check()){

            $cats = $catModel->getAllCat();

            $oneCnv = $cnvModel->getOneUserCnv($id, Auth::user()->id);

            $prsize = $rpsizeModel->getAllPriceSize();

            $allHan = $hanModel->getHan();

            $nowCat = $oneCnv->toArray()[0]['id_cat'];
            $nowMat = $oneCnv->toArray()[0]['id_material'];
            $nowHan = $oneCnv->toArray()[0]['id_hanger'];

            $allMat = $matModel->getMat();

            return view('admin.update')
                        ->withCvn($oneCnv)
                        ->withCat($cats)
                        ->withNowcat($nowCat)
                        ->withPrsize($prsize)
                        ->withMat($allMat)
                        ->withNowmat($nowMat)
                        ->withHan($allHan)
                        ->withNowhan($nowHan);
        }
    }

    //===========================
    //method storage cvs
    //===========================
    protected function storage(Cnv $cnvModel, Request $request){

        if(Auth::check()){

            $data['name_cnv'] = $request->input('name');
            $data['jsn_cnv'] = $request->input('jsn');
            $data['ch_public'] = $request->input('public');
            $data['id_cat'] = $request->input('id_cat');
            $data['id_user'] = Auth::user()->id;
            $data['id_pr_size'] = $request->input('id_pr_size');
            $data['id_mat'] = $request->input('id_mat');
            $data['id_hanger'] = $request->input('id_hanger');

            echo $cnvModel->addCnv($data);

        }
        
    }

    //===========================
    //method storage quickly cvs
    //===========================
    protected function addQ(Cnv $cnvModel, Request $request){

        if(Auth::check()){

            // dd($request->all());

            $data['name_cnv'] = $request->get('name');

            $data['jsn_cnv'] = $request->get('jsn_sess');

            if( empty($request->get('public')) )
                $data['ch_public'] = 0;
            else
                $data['ch_public'] = $request->input('public');

            $data['id_cat'] = $request->input('id_cat');

            $data['id_user'] = Auth::user()->id;

            $data['id_pr_size'] = $request->input('id_pr_size');

            $data['id_mat'] = $request->input('id_mat');

            $data['id_hanger'] = $request->input('id_han');

            $add = $cnvModel->addCnv($data);

            if($add)
                return redirect('admin/mycnv');

        }else{

            $request->session()->put('jsn', $request->get('jsn_sess'));
            $request->session()->put('name', $request->get('name'));

            if( empty($request->get('public')) )
                $request->session()->put('public', 0);
            else
                $request->session()->put('public', $request->get('public'));

            $request->session()->put('id_pr_size', $request->get('id_pr_size'));
            $request->session()->put('id_hanger', $request->get('id_han'));
            $request->session()->put('id_mat', $request->get('id_mat'));
            $request->session()->put('id_cat', $request->get('id_cat'));

            return redirect('auth/login');

        }
        
    }

    //===========================
    //method storage quickly cvs
    //===========================
    protected function getAddQ(Cnv $cnvModel, Request $request){

        if(Auth::check()){

            // dd($request->session()->all());

            $data['name_cnv'] = $request->session()->get('name');

            $data['jsn_cnv'] = $request->session()->get('jsn');

            $data['ch_public'] = $request->session()->get('public');

            $data['id_cat'] = $request->session()->get('id_cat');

            $data['id_user'] = Auth::user()->id;

            $data['id_pr_size'] = $request->session()->get('id_pr_size');

            $data['id_mat'] = $request->session()->get('id_mat');;

            $data['id_hanger'] = $request->session()->get('id_hanger');

            $add = $cnvModel->addCnv($data);

            if($add)
                return redirect('admin/mycnv');

        }else{

            return redirect('auth/login');

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
        $data['id_mat'] = $request->input('id_mat');
        $data['id_hanger'] = $request->input('id_hanger');

        echo $cnvModel->upCnv($data);
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
                
                $cartPrice += $iCart->price + $iCart->mat_price + $iCart->han_price;
            }

            return view('admin.cart')->withCvn($allCart)->withPrice($cartPrice);

        }else{

            return redirect()->back();
        }
    }

    //===========================
    //method view subs
    //===========================
    protected function getSubs(Sub $subModel, User $userModel){

        if(Auth::check()){

            $allSubs = $subModel->getSubs();
            $allUsers = $userModel->getUser();

            return view('admin.subs')->withSub($allSubs)->withUser($allUsers);

        }else{

            return redirect()->back();
        }
    }

    //===========================
    //method del subs
    //===========================
    protected function delSubs(Sub $subModel, $id){

        $data['id'] = $id;

        if(Auth::check()){

            $subModel->delSubs($data);
            return redirect()->back()->with('successadmin', 'Deleted User!');
        }

        return redirect()->back()->with('errorsadmin', 'Error!');;

    }

    //===========================
    //method del subs
    //===========================
    protected function delUser(User $userModel, $id){

        $data['id'] = $id;

        if(Auth::check()){

            $userModel->delUser($data);
            return redirect()->back()->with('successadmin', 'Deleted User!');
        }

        return redirect()->back()->with('errorsadmin', 'Error!');;

    }

    //===========================
    //method view qa
    //===========================
    protected function getQA(QandA $qaModel){

        if(Auth::check()){

            $allQA = $qaModel->getQA();

            return view('admin.qa')->withQa($allQA);

        }else{

            return redirect()->back();
        }
    }

    //===========================
    //method update categories
    //===========================
    protected function postUpQA(QandA $qaModel, Request $request){

        $valid = Validator::make($request->all(), [
            'q' => 'required|max:255',
            'a' => 'required',
        ]);

        if($valid->fails())
            return redirect()->back()->with('errorsadmin', 'Incorrectly filleds!');

        $data['q'] = htmlspecialchars($request->input('q'), ENT_QUOTES);
        $data['a'] = htmlspecialchars($request->input('a'), ENT_QUOTES);
        $data['id'] = $request->input('id');

        $qaModel->upQA($data);

        return redirect()->back()->with('successadmin', 'Update Q and A!');
    }

    //===========================
    //method update categories
    //===========================
    protected function postAddQA(QandA $qaModel, Request $request){

        $valid = Validator::make($request->all(), [
            'q' => 'required|max:255',
            'a' => 'required',
        ]);

        if($valid->fails())
            return redirect()->back()->with('errorsadmin', 'Incorrectly filleds!');

        $data['q'] = htmlspecialchars($request->input('q'), ENT_QUOTES);
        $data['a'] = htmlspecialchars($request->input('a'), ENT_QUOTES);
        $data['id'] = $request->input('id');

        $qaModel->addQA($data);

        return redirect()->back()->with('successadmin', 'Add Q and A!');
    }

    //===========================
    //method del qa
    //===========================
    protected function postDelQA(QandA $qaModel, Request $request){

        $data['id'] = $request->get('id');

        if(Auth::check()){

            $qaModel->delQA($data);
            return redirect()->back()->with('successadmin', 'Deleted Q nad A!');
        }

        return redirect()->back()->with('errorsadmin', 'Error!');

    }

    //===========================
    //method view material
    //===========================
    protected function getMaterial(Material $matModel){

        if(Auth::check()){

            $allMat = $matModel->getMat();

            return view('admin.material')->withMat($allMat);

        }else{

            return redirect()->back();
        }
    }

    //===========================
    //method get hanger
    //===========================
    protected function getHanger(Hanger $hanModel){

        if(Auth::check()){

            $allHan = $hanModel->getHan();

            return view('admin.hanger')->withHan($allHan);

        }else{

            return redirect()->back();
        }
    }


   //===========================
    //method update hanger
    //===========================
    protected function postUpHanger(Hanger $hanModel, Request $request){

        $valid = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'price' => 'numeric',
        ]);

        if($valid->fails())
            return redirect()->back()->with('errorsadmin', 'Incorrectly filleds!');

        if($request->hasFile('up_han_image') && $request->file('up_han_image')->isValid()){

            $data['image'] = $request->file('up_han_image');
            $data['image'] = $data['image']->getClientOriginalName();

            $request->file('up_han_image')->move(public_path('assets/images/'), $data['image']);

        }else{

            $data['image'] = 'noimage.png';
        }

        $data['title'] = htmlspecialchars($request->input('title'), ENT_QUOTES);
        $data['price'] = htmlspecialchars($request->input('price'), ENT_QUOTES);
        $data['id'] = $request->input('id');

        $hanModel->upHan($data);

        return redirect()->back()->with('successadmin', 'Update Material!');
    }

    //===========================
    //method add hanger
    //===========================
    protected function postAddHanger(Hanger $hanModel, Request $request){

        $valid = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'price' => 'numeric',
        ]);

        if($valid->fails())
            return redirect()->back()->with('errorsadmin', 'Incorrectly filleds!');

        if($request->hasFile('add_han_image') && $request->file('add_han_image')->isValid()){

            $data['image'] = $request->file('add_han_image');
            $data['image'] = $data['image']->getClientOriginalName();

            $request->file('add_han_image')->move(public_path('assets/images/'), $data['image']);



        }else{

            $data['image'] = 'noimage.png';
        }

        $data['title'] = htmlspecialchars($request->input('title'), ENT_QUOTES);
        $data['price'] = htmlspecialchars($request->input('price'), ENT_QUOTES);
        $data['id'] = $request->input('id');

        $hanModel->addHan($data);

        return redirect()->back()->with('successadmin', 'Add Material!');
    }

    //===========================
    //method del hanger
    //===========================
    protected function postDelHanger(Hanger $hanModel, Request $request){

        $data['id'] = $request->get('id');

        if(Auth::check()){

            $hanModel->delHan($data);
            return redirect()->back()->with('successadmin', 'Material!');
        }

        return redirect()->back()->with('errorsadmin', 'Error!');

    }

    //===========================
    //method get components
    //===========================
    protected function getComponents(Component $compModel){

        if(Auth::check()){

            $allComp = $compModel->getComponents();

            return view('admin.components')->withComp($allComp);

        }else{

            return redirect()->back();
        }
    }

   //===========================
    //method update material
    //===========================
    protected function postUpComponents(Component $compModel, Request $request){

        $valid = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'price' => 'numeric',
        ]);

        if($valid->fails())
            return redirect()->back()->with('errorsadmin', 'Incorrectly filleds!');

        if($request->hasFile('up_component_image') && $request->file('up_component_image')->isValid()){

            $data['image'] = $request->file('up_component_image');
            $data['image'] = $data['image']->getClientOriginalName();

            $request->file('up_component_image')->move(public_path('assets/images/'), $data['image']);


        }else{

            return redirect()->back()->with('errorsadmin', 'No select image!');
        }

        $data['title'] = htmlspecialchars($request->input('title'), ENT_QUOTES);
        $data['price'] = htmlspecialchars($request->input('price'), ENT_QUOTES);
        $data['id'] = $request->input('id');

        $compModel->upComponents($data);

        return redirect()->back()->with('successadmin', 'Update Component!');
    }

    //===========================
    //method add material
    //===========================
    protected function postAddComponents(Component $compModel, Request $request){

        $valid = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'price' => 'numeric',
        ]);

        if($valid->fails())
            return redirect()->back()->with('errorsadmin', 'Incorrectly filleds!');


        if($request->hasFile('add_component_image') && $request->file('add_component_image')->isValid()){

            $data['image'] = $request->file('add_component_image');
            $data['image'] = $data['image']->getClientOriginalName();

            $request->file('add_component_image')->move(public_path('assets/images/'), $data['image']);


        }else{

            return redirect()->back()->with('errorsadmin', 'No select image!');
        }

        $data['title'] = htmlspecialchars($request->input('title'), ENT_QUOTES);
        $data['price'] = htmlspecialchars($request->input('price'), ENT_QUOTES);
        $data['id'] = $request->input('id');

        $compModel->addComponents($data);

        return redirect()->back()->with('successadmin', 'Add Component!');
    }

    //===========================
    //method del material
    //===========================
    protected function postDelComponents(Component $compModel, Request $request){

        $data['id'] = $request->get('id');

        if(Auth::check()){

            $compModel->delComponents($data);
            return redirect()->back()->with('successadmin', 'Component!');
        }

        return redirect()->back()->with('errorsadmin', 'Error!');

    }

   //===========================
    //method update material
    //===========================
    protected function postUpMaterial(Material $matModel, Request $request){

        $valid = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'price' => 'numeric',
        ]);

        if($valid->fails())
            return redirect()->back()->with('errorsadmin', 'Incorrectly filleds!');

        if($request->hasFile('up_mat_image') && $request->file('up_mat_image')->isValid()){

            $data['image'] = $request->file('up_mat_image');
            $data['image'] = $data['image']->getClientOriginalName();

            $request->file('up_mat_image')->move(public_path('assets/images/'), $data['image']);

        }else{

            $data['image'] = 'noimage.png';
        }

        $data['title'] = htmlspecialchars($request->input('title'), ENT_QUOTES);
        $data['price'] = htmlspecialchars($request->input('price'), ENT_QUOTES);
        $data['id'] = $request->input('id');

        $matModel->upMat($data);

        return redirect()->back()->with('successadmin', 'Update Material!');
    }

    //===========================
    //method add material
    //===========================
    protected function postAddMaterial(Material $matModel, Request $request){

        $valid = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'price' => 'numeric',
        ]);

        if($valid->fails())
            return redirect()->back()->with('errorsadmin', 'Incorrectly filleds!');

        if($request->hasFile('add_mat_image') && $request->file('add_mat_image')->isValid()){

            $data['image'] = $request->file('add_mat_image');
            $data['image'] = $data['image']->getClientOriginalName();

            $request->file('add_mat_image')->move(public_path('assets/images/'), $data['image']);

        }else{

            $data['image'] = 'noimage.png';
        }

        $data['title'] = htmlspecialchars($request->input('title'), ENT_QUOTES);
        $data['price'] = htmlspecialchars($request->input('price'), ENT_QUOTES);
        $data['id'] = $request->input('id');

        $matModel->addMat($data);

        return redirect()->back()->with('successadmin', 'Add Material!');
    }

    //===========================
    //method del material
    //===========================
    protected function postDelMaterial(Material $matModel, Request $request){

        $data['id'] = $request->get('id');

        if(Auth::check()){

            $matModel->delMat($data);
            return redirect()->back()->with('successadmin', 'Material!');
        }

        return redirect()->back()->with('errorsadmin', 'Error!');

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
    //method delete cvs
    //===========================
    protected function postUpNumber(Settings $settModel, Request $request){

        if (Auth::check()){

            $data['number'] = $request->get('up_number');

            $up = $settModel->upNumber($data);

            if($up)
                return redirect()->back()->with('successadmin', 'Update number!');
            else
                return redirect()->back()->with('errorsadmin', 'Error!');
        }

        return redirect('/');
    }

    //===========================
    //method settings site
    //===========================
    protected function getSettings(Slider $sliderModel, Settings $settModel, Social $socModel){

        if (Auth::check()){

            $allSlider = $sliderModel->getAllSliders();
            $logo = $settModel->getLogo();
            $soc = $socModel->getSoc();
            $number = $settModel->getNumber();
            
            return view('admin.settings')
                    ->withSlider($allSlider)
                    ->withLogo($logo)
                    ->withSoc($soc)
                    ->withNumber($number['number']);
            
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
    //method get menu
    //===========================
    protected function getMenu(Menu $menuModel){

        if (Auth::check()){

            $allMenu = $menuModel->getMenu();
            
            return view('admin.menu')->withMenu($allMenu);
            
        }else{

            return redirect()->back();
        }

    }

    //===========================
    //method add item menu
    //===========================
    protected function postAddMenu(Menu $menuModel, Request $request){

        if(Auth::check()){

            $valid = Validator::make($request->all(), [
                'item' => 'required|max:40',
                'anchor' => 'required|max:20',
            ]);

            if($valid->fails())
                return redirect()->back()->with('errorsadmin', 'Incorrectly filleds!');

                $data['id'] = $request->input('id');
                $data['item'] = $request->input('item');
                $data['anchor'] = $request->input('anchor');

                $menuModel->addMenu($data);

                return redirect()->back()->with('successadmin', 'Added one new item to menu!');

        }else{

            return redirect()->back();
        }

        
    }

    //===========================
    //method update slider
    //===========================
    protected function postUpMenu(Menu $menuModel, Request $request){

        if(Auth::check()){

            $valid = Validator::make($request->all(), [
                'item' => 'required|max:40',
                'anchor' => 'required|max:20',
            ]);

            if($valid->fails())
                return redirect()->back()->with('errorsadmin', 'Incorrectly filleds!');

                $data['id'] = $request->input('id');
                $data['item'] = $request->input('item');
                $data['anchor'] = $request->input('anchor');

                $menuModel->upMenu($data);

                return redirect()->back()->with('successadmin', 'Update one new item to menu!');
        }else{

        }

        return redirect()->back();
    }

    //===========================
    //method delete slider
    //===========================
    protected function postDelMenu(Menu $menuModel, Request $request){

        $data['id'] = $request->input('id');

        $del = $menuModel->delMenu($data);

        if($del)
            return redirect()->back()->with('successadmin', 'Delete item menu!');
        else
            return redirect()->back()->with('errorsadmin', 'Error!');
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

            $carts = $cartModel->getAllCartsOrdered();

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

            $carts = $cartModel->getAllCartsStatus(Auth::user()->id);

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

    //===========================
    //method update view main banners
    //===========================
    protected function postUpMain(Cnv $cnvModel, Request $request){

        $data['id'] = $request->input('id');
        $data['main'] = $request->input('main');

        $cnvModel->upMain($data);

        return;
    }

    //===========================
    //method update done
    //===========================
    protected function getUpDone(Cart $cartModel, $id){

        $up = $cartModel->upDoneWait($id, 1);

        if($up)
            return redirect()->back()->with('successadmin', 'Order successfull!');
        else
            return redirect()->back()->with('errorsadmin', 'Error!');
    }

    //===========================
    //method update wait
    //===========================
    protected function getUpWait(Cart $cartModel, $id){

        $up = $cartModel->upDoneWait($id, 0);

        if($up)
            return redirect()->back()->with('successadmin', 'Order successfull!');
        else
            return redirect()->back()->with('errorsadmin', 'Error!');
    }

    //===========================
    //method update wait
    //===========================
    protected function getDispatch(Sub $subModel, User $userModel){

        if(Auth::check()){

            return view('admin.dispatch');
        }

    }

    //===========================
    //method update wait
    //===========================
    protected function postDispatch(Sub $subModel, User $userModel, Request $request){

        if(Auth::check()){

            $subs = $subModel->getSubs();
            $users = $userModel->getUser();
            $adminEmails = $userModel->getAdmin();

            foreach ($adminEmails as $iEmail) {
                $adminEmail = $iEmail->email;
            }

            foreach ($subs as $iSub) {
                $data['users'][] = $iSub->email;
            }

            foreach ($users as $iUser) {
                $data['users'][] = $iUser->email;
            }


            foreach($data['users'] as $iEmail){

                $dispatch = Mail::send(['html' => 'emails.dispatch'], 
                                        ['input' => $request], function($message) 
                                                                use ($request, $adminEmail, $iEmail)
                {
                    $message->to($iEmail);
                    $message->subject('UP Group Printing');
                    $message->from($adminEmail);
                });
            }

            return redirect()->back()->with('successadmin', 'Dispatch Sended!');
  
        }
    }

    //===========================
    //method select design
    //===========================
    protected function getSelDesign(Cnv $cnvModel, Request $request){

        $allCnv = $cnvModel->getAllSelectedCnv($request->get('prepair_size'));

        return view('admin.seldesign')->withCvn($allCnv)->withParam($request->all());
    }

//end class
}
