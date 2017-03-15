<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth\RegisterController as RC;
use Illuminate\Support\Facades\Validator;
use App\Lock;
use Auth;

class UserController extends Controller
{

  protected function passwordValidator(array $data)
  {
      return Validator::make($data, [
          'password' => 'required|min:6|confirmed',
      ]);
  }

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


  public function delete(User $User)
  {
    $User->delete();
    return back();
  }

  public function profile()
  {
    return view('user.profile');
  }

  public function passwordChange()
  {
    return view('user.changePassword');
  }
  public function passwordUpdate(Request $request)
  {
    $this->passwordValidator($request->all());
    auth::user()->password = bcrypt($request['password']);
    auth::user()->save();
    return back();
  }
}
