<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Lock;
use App\User;
use Auth;

class LocksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show()
    {

      $locks = Lock::all();
      return view('home.locks', compact('locks'));

    }
    public function edit(Lock $Lock)
    {
      $users = User::all();
      return view('home.lockEdit', compact('Lock','users'));

    }
    public function create()
    {

      return view('home.lockCreate');

    }

    public function update(Request $request, Lock $Lock)
    {
      $Lock->update($request->all());
      return back();
    }

    public function delete(Lock $Lock)
    {
      $Lock->delete();
      return back();
    }

    public function connect(Request $request, Lock $Lock)
    {
      $User = User::find($request['user']);
      if(!($Lock->users->contains($User)))
      {
        $Lock->users()->attach($User);
      }
      return back();
    }

    public function removeUser(Lock $Lock, User $User)
    {
      $Lock->users()->detach($User);
      return back();
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'room' => 'required|unique:locks,room',
        'address' => 'required|unique:locks,address',
        'password' => 'required|min:6'
      ]);

      $Lock = new Lock($request->all());
      $Lock->save();

      return back();
    }
    public function build(Lock $Lock)
    {
      $contents = file_get_contents(public_path() . '/Build/deviceinfo.h');

      $contents = $contents . '/*Device Name*/ ' . PHP_EOL . 'const static char       DEVICE_NAME[]           = "'.$Lock->room.'";'. PHP_EOL;
      $contents = $contents . '/*Device Password*/ ' . PHP_EOL . 'const char              PASSWORD[]              = "'.$Lock->password.'";'. PHP_EOL;
      //dd($contents);

      file_put_contents(public_path() . '/Build/SmartLock/deviceinfo.h', $contents);
      if(file_exists(public_path() . '/Build/SmartLock/Makefile'))
      {
        $buildpath = public_path(). '/Build/SmartLock/';
        $output = exec('make --directory="$buildpath"');
        echo($output);
      }
      else
      {
        echo("No Makefile");
      }

    }

}
