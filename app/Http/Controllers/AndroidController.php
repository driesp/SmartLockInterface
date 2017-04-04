<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class AndroidController extends Controller
{
    public function login(Request $request)
    {
      if($request->email != NULL && $request->password != NULL)
      {
        $user = User::where('email', $request->email)->get();
        if( $user != NULL)
        {
          if(Auth::attempt(array('email' => $request->email, 'password' => $request->password)))
          {
            return "success:". $user[0]->id. ":". $user[0]->name.":".$user[0]->email;
          }
          else
          {
            return "These are not the credentials you are looking for.";
          }
        }

      }
    }
    public function data(Request $request)
    {
      if($request['id'] != NULL)
      {
        $user = User::find($request['id']);
        if( $user != NULL)
        {
          $Locks = $user->Locks;
          $data = "";
          foreach ($Locks as $lock) {
            $intervalData = "[".$lock->room.";".$lock->password.";".$lock->address.";".$lock->bonding."]";

            $data .= $intervalData ."#";

          }
          return $data;
        }
        else {
          return 'error';
        }

      }
    }
}
