<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth\RegisterController as RC;
use App\Lock;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function show()
  {
    $users = User::All();
    return view('home.users',compact('users'));
  }

  public function edit(User $User)
  {
    return view('home.userEdit', compact('User'));
  }

  public function create()
  {
    return view('home.userCreate');
  }

  public function update(Request $request, User $User)
  {

    if(!($request['password_old'] == $request['password']))
    {
      $request['password'] = bcrypt($request['password']);
    }
    $request->offsetUnset('password_old');
    $User->update($request->all());
    return back();
  }
  public function profile()
  {
    return view('user.profile');
  }

  public function delete(User $User)
  {
    $User->delete();
    return back();
  }
}
