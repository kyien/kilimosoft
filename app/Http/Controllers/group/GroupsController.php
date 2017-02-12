<?php

namespace App\Http\Controllers\group;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use App\Group;
use Image;
use Flashy;
use App\Http\Controllers\Controller;
use App\Produce;
use Vsmoraes\Pdf\Pdf;
class GroupsController extends Controller
{
    //

    // public function UserRole($group_id){
    //
    //   return $this->groups()
    //               ->join('group_user', 'group_user.role', '=', $role);
    //
    // }

      public function index($group_id){

$user=Auth::user();
    // $group=DB::table('groups')->where('id',$id)->first();
 $group=Group::findOrFail($group_id);
// $group=DB::table('groups');
     $countusers=$group->users()->where('group_user.approved','=',1)->count();
     $countrequests=$group->users()->where('group_user.approved','=',0)->count();

  // $role=DB::table('group_user')->where([['group_id',$group_id],['role','=','admin']])->pluck('role')->first();

  //dd($role);
     return view('groups.index',compact('group','countusers','countrequests','admin','collector','user'));

      }

      public function admin_dash($group_id){
    $group=Group::findOrFail($group_id);
         $countusers=$group->users()->where('group_user.approved','=',1)->count();
         $countrequests=$group->users()->where('group_user.approved','=',0)->count();
         $isadmin=Auth::user()->hasRole('admin');
         $collector==Auth::user()->hasRole('collector');
         $user==Auth::user()->hasRole('user');

         return view('groups.dashboard',compact('group','countusers','countrequests','admin','collector','user'));
      }
//method to insert data from create group form into database

    public function store(Request $request){
      $img='group-avatar.png';

      $this->validate($request,
      [
        'name' => 'required|alpha_dash|max:255|unique:groups',
        'short_description' => 'required|max:255',
        'location'  => 'required',
        'produce_id'=> 'required|array|min_array_size:1'
      ]);

      $user_id= Auth::user()->id;
      $data1=[
        'name' => $request->name,
        'location' =>$request->location,
        'short_description' => $request->short_description,
         'image'=> $img,
         'user_id'=>$user_id
      ];
      $data2=$request->produce_id;

      $group = Group::create($data1);

    //  $group->create( $data1);



$group_users=$group->users()->attach( $user_id,['role'=>'admin', 'approved'=>true]);
$group_produce=$group->produces()->sync($data2);

  Flashy::success('Group created successfully!');

        return redirect()->route('group', ['user_id'=>$user_id,'group_id'=> $group->id]);
    }



    public function update(Request $request,$id){

//dd($request);
        $validate=$this->validate($request,[
          'description' => 'aplpha_dash|max:255',
          'short_description'=> 'alpha_dash|max:255',
        //  'image' => 'mimes:jpeg,png,gif,bmp',

      ]);


      if($request->hasFile('image')) {
          $image =  $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(500, 500)->save(public_path('storage/group_avatars/' .  $filename));
              }

                $group= DB::table('groups')->where('id',$id);

       $group->update( [
          'description'=>$request->description,
          'short_description' => $request->short_description,
          'location'=> $request->location,
          'image' => $filename,

        ]);

  Flashy::success('Profile Updated successfully!');
          return redirect()->back();

    }

      public function edit($id){

      $group=DB::table('groups')->where('id','=',$id)->first();
    // dd($group);
         //$group=Groups::group($id);

          return view('groups.edit_group_profile')->with('group',$group);
        }

          public function get_groups($id){


             $Notusergroups=  Group::whereDoesntHave('users', function ($query) use($id) {
                  $query->where('group_user.user_id','=',$id);
            })
            ->get();


          // dd(  $Notusergroups);
           return view('groups.groupsview')->with('Notusergroups',$Notusergroups);
          }


         public function show_created_groups($id) {

        $group= DB::table('groups')->where('user_id','=', $id)->get();

          //dd($group);
           return view('groups.mygroups')->with('groups',$group);
         }

         public function show_joined_groups($id) {
             $user=User::findOrFail($id);

         $usergroups=$user->groups()->where([['group_user.role','!=','admin'],['group_user.User_id','=',$id]])->get();
          //dd($group);
           return view('groups.joinedgroups')->with('usergroups',$usergroups);
         }

         public function show_pending_users($group_id){

           $group=Group::findOrFail($group_id);
           $pendingusers=$group->users()->where('group_user.approved','=',0)->get();

           if(!$pendingusers){

             Flashy::warning('Request failed!');
             return redirect()->back();
           }

           return view('groups.manage.edit_requests',compact('group','pendingusers'));

         }
         public function show_group_users($group_id){
            $group=Group::findOrFail($group_id);
             $groupusers=$group->users()->where('group_user.approved','=',1)->get();

             return view('groups.groupusers',compact('group','groupusers'));

         }
         public function delete_user($user_id,$group_id){

                $group=Group::findOrFail($group_id);
              $delete= $group->users()->detach($user_id);

                  if(!$delete){

                      Flashy::warning('Could not delete Member!');
                         return redirect()->back();
                  }

                Flashy::success('Member deleted successfully!');

               return redirect()->back();
         }


}
