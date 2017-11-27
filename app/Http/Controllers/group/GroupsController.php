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
use App\Post;
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



$group=Group::findOrFail($group_id);


        $countusers=$group->users()->where('group_user.approved','=',1)->count();
        $countrequests=$group->users()->where('group_user.approved','=',0)->count();

    //  $group_posts=DB::table('posts')->where('group_id',$group_id)->get();
$user_id=Auth::user()->id;

    // $count_posts=DB::table('posts')->where('group_id',$group_id)->count();
    $count_posts=$group->posts()->count();

  $role=$group->users()->where([['group_id',$group_id],['user_id','=',$user_id]])->pluck('role')->first();

  if($role=='admin'){

   return view('groups.dashboard',compact('group','countusers','countrequests','count_posts'));


 }
 else{

 return view('groups.index',compact('group','countusers','countrequests','count_posts'));
     }

   //dd( $user_id);


      }

      public function group_posts($group_id){
    $group=Group::findOrFail($group_id);

 $group_posts=Group::with('users.posts')->where('id',$group_id)->get();

 return view('groups.posts',compact('group','group_posts'));


      }

      public function group_info($group_id){
        $group=Group::findOrFail($group_id);

        return view('groups.manage.about_group')->with('group',$group);
  }


      public function create_group_view(){
$produces= Produce::all();

        return view('groups.group_create')->with('produces',$produces);
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



$group_users=$group->users()->attach( $user_id,['role'=>'admin', 'approved'=>true, 'creator'=>true]);
$group_produce=$group->produces()->sync($data2);

  Flashy::success('Group created successfully!');

        return redirect()->route('group', ['user_id'=>$user_id,'group_id'=> $group->id]);
    }



    public function update(Request $request,$id){

//dd($request);
        $this->validate($request,[
          'description' => 'required|max:255',
          'short_description'=> 'required|max:255',
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

         $usergroups=$user->groups()->where([['group_user.role','!=','admin'],['group_user.approved','=',1],])->get();
          //dd($group);
           return view('groups.joinedgroups')->with('usergroups',$usergroups);
         }

         public function show_pending_users($group_id){

           $group=Group::findOrFail($group_id);
           $pendingusers=$group->users()->where('group_user.approved','=',0)->get();

         $countrequests=$group->users()->where('group_user.approved','=',0)->count();

           return view('groups.manage.edit_requests',compact('group','pendingusers','countrequests'));

         }
         public function show_group_users($group_id){
            $group=Group::findOrFail($group_id);
             $groupusers=$group->users()->where('group_user.approved','=',1)->get();

             return view('groups.groupusers',compact('group','groupusers'));

         }

         public function edit_group_users($group_id){
            $group=Group::findOrFail($group_id);
             $groupusers=$group->users()->where([['group_user.approved','=',1],['group_user.role','!=','admin']])->get();

             return view('groups.manage.editusers',compact('group','groupusers'));

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
