<?php

namespace App\Http\Controllers\group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use App\Group;
use Image;
use Flashy;
use App\User;

class RolesController extends Controller
{
    //

    public function index($group_id){

 $group=Group::findOrFail($group_id);
   $groupusers =$group->users()->where('group_user.creator','=',false)->get();
   //dd( $groupusers);
      return view('groups.manage.roles', compact('group','groupusers'));
    }


    public function assign_role(Request $req){

      $this->validate($req,[
        'member' => 'required',
        'role'=> 'required',


    ]);
    $user=  $req->member;
      $group=Group::findOrFail($req->group_id);
      $role=$req->role;

       $group->users()->updateExistingPivot($user,['role'=>$role]);

       Flashy::success('Role assigned successfully!');
return redirect()->back();
    }

    public function update_role(){


    }


}
