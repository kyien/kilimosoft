<?php

namespace App\Http\Controllers\group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class \GroupusersController extends Controller
{
    //


    public function add_member($userId){
        

        $group->addMembers($userId);

        return redirect()->back();
    }









}
