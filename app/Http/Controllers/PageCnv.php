<?php

namespace App\Http\Controllers;

use App\Models\Cnv;

use Mail;
use Validator;
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

    //===========================
    //method home cvs
    //===========================
    protected function getHome(Cnv $cnvModel){

        $allCnv = $cnvModel->getAllCnv();

        return view('index')->withCvn($allCnv);
    }

    //===========================
    //method feedback cvs
    //===========================
    protected function postFeedback(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'max:12',
            'q' => 'required',
        ]);

        if ($validator->fails()) 
            return redirect('/')->with('errors', 'Incorrectly filleds feedback!')->withInput();

        Mail::send(['html' => 'emails.feedback'], ['input' => $request], function($message) use ($request)
        {
            $message->to('silverreve23@gmail.com');
            $message->subject('FeedBack of UP Group Printing');
            $message->from($request->get('email'));
            if($request->hasFile('file'))
                $message->attach($request->file('file')->getPathName(),
            ['as' => 'attach_file.'.$request->file('file')->getClientOriginalExtension(), 'mime' => $request->file('file')->getMimeType()]);
        });

        return redirect()->back()->with('sended', 'Feedback sunded!');
    }

    //===========================
    //method get order cvs
    //===========================
    protected function getOrder(){

        return view('order');
    }

    //===========================
    //method post order cvs
    //===========================
    protected function postOrder(Request $request){

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

        Mail::send(['html' => 'emails.order'], ['input' => $request], function($message) use ($request)
        {
            $message->to('silverreve23@gmail.com');
            $message->subject('Order on free design email of UP Group Printing');
            $message->from($request->get('email'));
            if($request->hasFile('logo_file'))
                $message->attach($request->file('logo_file')->getPathName(),
            ['as' => 'attach_file.'.$request->file('logo_file')->getClientOriginalExtension(), 'mime' => $request->file('logo_file')->getMimeType()]);
        });

        return redirect('/')->with('sended', 'Order free design form sended!');;
    }

}
