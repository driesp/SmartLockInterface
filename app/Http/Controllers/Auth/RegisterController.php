<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Mail\Welcome;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'function' => 'required|max:255',
            'department' => 'required|max:255',
            'telephone' => 'required|max:255',
            'address' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'admin' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'function' => $data['function'],
            'department' => $data['department'],
            'password' => bcrypt($data['password']),
            'telephone' => $data['telephone'],
            'address' => $data['address'],
            'admin' => $data['admin'],
        ]);
    }

    public function register(Request $request)
    {
      $validator = $this->validator($request->all());

      if ($validator->fails()) {
          $this->throwValidationException(
              $request, $validator
          );
      }

      $User = $this->create($request->all());

      Mail::to(User::find(1))->send(new Welcome($User,$request['password']));

      return back();
  }
}
