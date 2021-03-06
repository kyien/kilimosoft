<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
    logout as performLogout;
}
    /**
     * Where to redirect users after login.
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
        $this->middleware('guest', ['except' => 'logout']);
    }


    protected function credentials(Request $request)
        {
            //return $request->only($this->username(), 'password');
            $field = filter_var($request->input($this->username()), FILTER_VALIDATE_EMAIL) ? 'email' : 'phoneNo';
   $request->merge([$field => $request->input($this->username())]);
   return $request->only($field, 'password');
        }


    public function username()
        {
              return 'login';
        }

        public function logout(Request $request)
          {
              $this->performLogout($request);
              return redirect()->route('login');
          }

}
