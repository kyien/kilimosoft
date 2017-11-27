<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use Auth;

class NotificationController extends Controller
{
    //



public function index(){

$user=Auth::user()->id;


  return view('notify.notifications', compact('user','count'));

       }
}
