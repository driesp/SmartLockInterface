<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lock;

class LocksController extends Controller
{
    public function show()
    {
      $locks = Lock::all();

      return view('home.locks', compact('locks'));
    }
    public function edit(Lock $Lock)
    {
      return view('home.lockEdit', compact('Lock'));
    }
}
