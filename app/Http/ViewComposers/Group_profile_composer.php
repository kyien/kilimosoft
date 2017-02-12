<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
Use Musonza\Groups\Groups;
  class Group_profile_composer {

public function create(View $view){

  $view->with('group', Groups::all() );
  //$view->with('user_avatar',Auth::user()->avatar);
}


  }
