<?php

namespace App\Http\Controllers;

use Auth;

use Mail;
use Validator;
use Illuminate\Http\Request;

use App\Models\Cnv;
use App\Models\Cart;
use App\Models\Categories;
use App\Models\SizePriceCanvas;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Settings;
use App\Models\Sub;
use App\Models\Menu;
use App\Models\QandA;
use App\User;


use App\Http\Requests;

class PageCnv extends Controller{

    //method boot load
    public function __construct(Cart $cartModel, Menu $menuModel){

        $allMenu = $menuModel->getMenu();

        if (Auth::check()){

            $allCart = $cartModel->getAllCnvCart(Auth::user()->id);


            if($allCart->count() > 0)
                return view()->share(['cart' => $allCart->count(), 'menu' => $allMenu]);
            else
                return view()->share('menu', $allMenu);

        }else{

            return view()->share('menu', $allMenu);
        }
    }

    //===========================
    //method views all cvs
    //===========================
    protected function views(Cnv $cnvModel){

        $allCnv = $cnvModel->getAllGalleryCnv();

        return view('views')->withCvn($allCnv);
    }

    //===========================
    //method view one cvs
    //===========================
    protected function view(Cnv $cnvModel, $id){

        $oneCnv = $cnvModel->getOneCnv($id);

        return view('view')->withCvn($oneCnv);
    }

    //===========================
    //method view conf order
    //===========================
    protected function getConfOrder(Cnv $cnvModel, QandA $qaModel, Categories $catModel, Settings $settModel, Slider $sliderModel, Social $socModel, $email){

        $allCnv = $cnvModel->getAllHomeCnv();
        $cats = $catModel->getAllCat();
        $logo = $settModel->getLogo();
        $slider = $sliderModel->getAllSliders();
        $soc = $socModel->getSoc();
        $allQA = $qaModel->getQA();

        return view('conf_order')->withCvn($allCnv)->withCat($cats)->withLogo($logo)->withSlider($slider)->withSoc($soc)->withQa($allQA)->withUser($email);
    }

    //===========================
    //method conf order send
    //===========================
    protected function postConfOrderSend(User $userModel, Request $request){

        $adminEmails = $userModel->getAdmin();

        foreach ($adminEmails as $iEmail){
            $adminEmail = $iEmail->email;
        }

        if($request->hasFile('zip_file')){
            if($request->file('zip_file')->extension() != 'zip')
                return redirect()->back()->with('errors', 'Incorrectly type file!');
        }

        $send = $mail = Mail::send(['html' => 'emails.conf_order'], ['input' => $request], function($message) use ($request, $adminEmail)
        {
            $message->to($adminEmail);
            $message->subject('FeedBack of UP Group Printing');
            $message->from($request->get('user'));
            if($request->hasFile('zip_file'))
                $message->attach($request->file('zip_file')->getPathName(),
            ['as' => $request->get('title_zip').'.'.$request->file('zip_file')->getClientOriginalExtension(), 'mime' => $request->file('zip_file')->getMimeType()]);
        });

        if($send)
            return redirect()->back()->with('sended', 'Sended! Expect a message on your Email!');
    }

    //===========================
    //method home cvs
    //===========================
    protected function getHome(Cnv $cnvModel, QandA $qaModel, Categories $catModel, Settings $settModel, Slider $sliderModel, Social $socModel){

        $allCnv = $cnvModel->getAllHomeCnv();
        $cats = $catModel->getAllCat();
        $logo = $settModel->getLogo();
        $slider = $sliderModel->getAllSliders();
        $soc = $socModel->getSoc();
        $allQA = $qaModel->getQA();

        return view('index')->withCvn($allCnv)->withCat($cats)->withLogo($logo)->withSlider($slider)->withSoc($soc)->withQa($allQA);
    }

    //===========================
    //method feedback cvs
    //===========================
    protected function postFeedback(User $userModel, Sub $subModel, Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'max:12',
            'q' => 'required',
        ]);

        if ($validator->fails()) 
            return redirect('/')->with('errors', 'Incorrectly filleds feedback!')->withInput();

        $adminEmails = $userModel->getAdmin();

        foreach ($adminEmails as $iEmail) {
            $adminEmail = $iEmail->email;
        }


        $data['email'] = $request->get('email');
        $data['name'] = $request->get('name');

        $mail = Mail::send(['html' => 'emails.feedback'], ['input' => $request], function($message) use ($request, $adminEmail)
        {
            $message->to($adminEmail);
            $message->subject('FeedBack of UP Group Printing');
            $message->from($request->get('email'));
            if($request->hasFile('file'))
                $message->attach($request->file('file')->getPathName(),
            ['as' => 'attach_file.'.$request->file('file')->getClientOriginalExtension(), 'mime' => $request->file('file')->getMimeType()]);
        });

        if($mail){
            if(!$subModel->getOneSub($data['email']))
                $subModel->addSubs($data);
            return redirect()->back()->with('sended', 'Feedback sended! Expect a message on your Email!');
        }

        
    }

    //===========================
    //method get order cvs
    //===========================
    protected function getOrder(Cnv $cnvModel, QandA $qaModel, Categories $catModel, Settings $settModel, Slider $sliderModel, Social $socModel){

        $cats = $catModel->getAllCat();
        $logo = $settModel->getLogo();
        $slider = $sliderModel->getAllSliders();
        $soc = $socModel->getSoc();
        $allQA = $qaModel->getQA();

        return view('order')->withCat($cats)->withLogo($logo)->withSlider($slider)->withSoc($soc)->withQa($allQA);
    }

    //===========================
    //method post order cvs
    //===========================
    protected function postOrder(User $userModel, Request $request){

        $adminEmails = $userModel->getAdmin();

        foreach ($adminEmails as $iEmail) {
            $adminEmail = $iEmail->email;
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'max:12',
            'email' => 'required|email',

            'company_name' => 'required|max:40',
            'company_massage' => 'required|max:255',
            'company_phone' => 'max:20',
            'company_web' => 'max:50',
            'activity' => 'max:50',
            'logo_text' => 'required|max:30',
            'message' => 'required|max:500',
   
        ]);

        if ($validator->fails()) 
            return redirect('/order')->with('errors', 'Incorrectly filleds order feedback!')->withInput();

        Mail::send(['html' => 'emails.order'], ['input' => $request], function($message) use ($request, $adminEmail)
        {
            $message->to($adminEmail);
            $message->subject('Order on free design email of UP Group Printing');
            $message->from($request->get('email'));
            if($request->hasFile('logo_file'))
                $message->attach($request->file('logo_file')->getPathName(),
            ['as' => 'attach_file.'.$request->file('logo_file')->getClientOriginalExtension(), 'mime' => $request->file('logo_file')->getMimeType()]);
        });

        Mail::send(['html' => 'emails.order_back'], ['input' => $request], function($message) use ($request, $adminEmail)
        {
            $message->to($request->get('email'));
            $message->subject('Answer on free design email of UP Group Printing');
            $message->from($adminEmail);
            if($request->hasFile('logo_file'))
                $message->attach($request->file('logo_file')->getPathName(),
            ['as' => 'attach_file.'.$request->file('logo_file')->getClientOriginalExtension(), 'mime' => $request->file('logo_file')->getMimeType()]);
        });

        return redirect('/')->with('sended', 'Order free design form sended!');;
    }

    //===========================
    //method get index tests
    //===========================
    protected function getIndex($id){

        return view('index'.$id);
    }

//end class
}
