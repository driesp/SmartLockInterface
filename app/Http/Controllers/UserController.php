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


  protected function ucPasswordValidator(array $data)
  {
      return Validator::make($data, [
          'password' => 'required|min:6|confirmed',
      ]);
  }

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('admin');
  }

  public function ucShow()
  {
    $users = User::All();
    return view('user.ucList',compact('users'));
  }

  public function ucEdit(User $User)
  {
    return view('user.ucEdit', compact('User'));
  }

  public function ucCreate()
  {
    return view('user.ucCreate');
  }

  public function ucUpdate(Request $request, User $User)
  {

    if(!($request['password_old'] == $request['password']))
    {
      $request['password'] = bcrypt($request['password']);
    }
    $request->offsetUnset('password_old');
    $User->update($request->all());
    return back();
  }


  public function ucDelete(User $User)
  {
    $User->delete();
    return back();
  }

  public function ucProfile()
  {
    return view('user.ucProfile');
  }

  public function ucPasswordChange()
  {
    return view('user.ucChangePassword');
  }
  public function ucPasswordUpdate(Request $request)
  {
    $this->ucPasswordValidator($request->all());
    auth::user()->password = bcrypt($request['password']);
    auth::user()->save();
    return back();
  }
}
