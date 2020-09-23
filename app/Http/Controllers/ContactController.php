<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\ContactMe;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Constructor of ContactController class
     */
    public function __construct()
    {
    }

    public function upload_csv()
    {
        $file = request()->file('csv');
        //var_dump($file);
        //var_dump("test");
        $this->parseImport($file);
    }

    public function parseImport($file)
    {
        $file = fopen($file, 'r');
        while (($line = fgetcsv($file)) !== FALSE) {
            $data = [
                'id' => $line[0],
                'name' => $line[1]
            ];
            print_r($data);
            //$this->store($request);
        }
        $this->store();
        fclose($file);
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
        //var_dump(request());
        //die;
        request()->validate(['email' => 'required|email']);
        $email = request('email');

        // simple email
        // Mail::raw('It works', function ($message) {
        //     $message->to(request('email'))
        //         ->subject('Hello there');
        // });

        //Mail::to($email)->send(new ContactMe("Laravel"));
        Mail::to($email)->send(new Contact());

        return redirect('/contact')->with('message', 'Email sent!');
    }
}
