<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lock;
use App\User;


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
    public function dashboard()
    {

      return view('home.dashboard');
    }

    public function controlpanel()
    {

      return view('home.controlpanel');
    }

    public function locks()
    {

      return view('home.locks');
    }
    public function users()
    {

      return view('home.users');
    }
}
