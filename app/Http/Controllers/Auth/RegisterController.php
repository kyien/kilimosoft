<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\RedirectResponse;
use App\Profile;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Flashy;

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
     * Where to redirect users after login / registration.

     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
          'firstName' => 'required|max:255|alpha',
            'lastName' => 'required|max:255|alpha',
            'phoneNo' =>  'required|phone:LENIENT,KE,fixed_line,mobile|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'location' => 'required',
            'username' => 'required|max:50|min:6|alpha_dash|unique:users',
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
      $avatar='avatar_default.jpg';


        $user= User::create([
          'firstName' => $data['firstName'],
          'lastName' => $data['lastName'],
          'phoneNo' => $data['phoneNo'],
          'username' => $data['username'],
        'location' => $data['location'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'avatar' => $avatar
        ]);

        Profile::create(['user_id' => $user->id]);
        // if(!$user){
        //  Flashy::warning('Unable to register!');
        //   return->redirect()->back();
        //
        // }

        return $user;
    }
}
