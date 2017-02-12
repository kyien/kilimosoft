<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Group;
class GroupsviewController extends Controller
{
    //


    public function index() {

       $groups = DB::table('groups')->get();


//dd($groups);
       return view('groupscollection')->with('groups',$groups);
    }
}
