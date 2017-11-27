<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Group;
use App\Produce;
class GroupsviewController extends Controller
{
    //


    public function index() {

       $groups = DB::table('groups')->get();


//dd($groups);
       return view('groupscollection')->with('groups',$groups);
    }

    public function groups_crops_view(Request $r){

 $id=$r->id;
$produce=Produce::findOrFail($id);
$groups=$produce->groups()->get();

    }
}
