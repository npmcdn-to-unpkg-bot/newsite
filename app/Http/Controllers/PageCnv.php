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
            'q' => 'required',
        ]);

        if ($validator->fails()) 
            return redirect('/')->withErrors($validator)->withInput();

        Mail::send('emails.welcome', ['input' => $request], function($message) use ($request)
        {
            $message->to('silverreve23@gmail.com');
            $message->subject('FeedBack of UP Group Printing');
            $message->from($request->get('email'));
            if($request->hasFile('file'))
                $message->attach($request->file('file')->getPathName(),
            ['as' => 'attach_file.'.$request->file('file')->getClientOriginalExtension(), 'mime' => $request->file('file')->getMimeType()]);
        });

        return redirect()->back();
    }

    //===========================
    //method o cvs
    //===========================
    protected function getO(Cnv $cnvModel){

        // $allCnv = $cnvModel->getAllCnv();

        return view('order');
    }

}
