<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;

class sendMailController extends Controller
{
    public function index()
    {
        return view('mail.contactForm');
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'name' => 'required'
        ]);

        $data = array(
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
            'email' => $request->email
        );

        Mail::to($request->email)->send(new sendMail($data));

        $notification = array(
            'title' => 'Mail',
            'message' => 'Congratulation! New Mail Send  Successfully.',
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }
}
