<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;

class sendMailController extends Controller
{
   public function index(){
   	return view('mail.contactForm');
   }

   public function send(Request $request){
   	$this->validate($request,[
   		'name'  => 'required',
   		'email'  => 'required|email',
   		'message'  => 'required',


   	]);
   	$data =  array(
   		'name' => $request->name,
   		'message' => $request->message,
   		'mail'=>$request->mail
   	);
   	Mail::to('mdrefat382139@gmail.com')->send(new sendMail($data));

   	//Mail::to($data['mail'])->send(new sendMail($data));
   	$notification = array(
            'title' => 'Mail',
            'message' => 'Congratulation! New Mail Send  Successfully.',
            'alert-type' => 'success',
        );
   	return back()->with($notification);
   }
}
