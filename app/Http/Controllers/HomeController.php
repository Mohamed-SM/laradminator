<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Mail\SendMailable;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }

    public function mail(Request $request)
    {
        $name = 'Mohamed';
        Mail::to('smuniv.sba@gmail.com')->send(new SendMailable($name));

        return 'Email was sent';
    }
}
