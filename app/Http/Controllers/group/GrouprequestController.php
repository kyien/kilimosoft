<?php

namespace App\Http\Controllers\group;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Group;
use App\User;
use Flashy;

class GrouprequestController extends Controller
{
    //



    public function request_to_join_group($user_id,$group_id){

               //dd($request->all());
               $group=Group::findOrFail($group_id);

               $user=User::findOrFail($user_id);

               if($group->users->contains($user)){

                 Flashy::info('Either a member of that group or request already sent!');


                 return redirect()->back();


               }
               else {

$group_user=$group->users()->attach( $user_id,['role'=>'user', 'approved'=>false]);

Flashy::success('Request successfully made!');
   return redirect()->back();

               }


    }


     public function accept_group_request($user_id,$group_id){

       $group=Group::findOrFail($group_id);
       $accept=$group->users()->update($user_id, ['approved'=>true]);

       Flashy::success('User added successfully!');
return redirect()->back();

     }

     public function decline_group_request($user_id,$group_id){

            $group=Group::findOrFail($group_id);
            $group->users()->detach($user_id);


     }


}
