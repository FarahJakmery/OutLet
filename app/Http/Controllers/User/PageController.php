<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\testMail;
use App\Models\About;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function about()
    {
        $about = About::translated()->first();
        return view('User.pages.about', compact('about'));
    }

    public function sent_message_to_email(Request $request)
    {
        $email = 'farahesp8266@gmail.com';
        $email_from = 'farah97jojo@gmail.com';
        $details = [
            'title' => 'test email',
            'first_name'  => $request->first_name,
            'last_name'  => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'body'  => $request->message,

        ];
        Mail::to('farahesp8266@gmail.com')->send(new testMail($details));
        Session::flash('message', 'Your message has been sent ');
        return redirect()->back();
    }
}
