<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Auth;
  class ProfileComposer {

public function create(View $view){

  $view->with('user', Auth::user());
  //$view->with('user_avatar',Auth::user()->avatar);
}


  }
