<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Lock;
use App\User;
use Mail;
use App\Mail\Welcome;


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
     * @return \Illuminate\Http\Response
     */
    public function hcDashboard()
    {
      return view('home.dashboard');
    }

    public function hcControlpanel()
    {
      return view('home.controlpanel');
    }
}
