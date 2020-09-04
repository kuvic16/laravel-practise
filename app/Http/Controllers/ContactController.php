<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Constructor of ContactController class
     */
    public function __construct()
    {
    }

    /**
     * Show the contact page
     * 
     * @return Illuminate\View\View
     */
    public function show()
    {
        return view('contact');
    }

    /**
     * Store the contact info
     */
    public function store()
    {
        request()->validate(['email' => 'required|email']);
        $email = request('email');

        Mail::raw('It works', function ($message) {
            $message->to(request('email'))
                ->subject('Hello there');
        });

        return redirect('/contact')->with('message', 'Email sent!');
    }
}
