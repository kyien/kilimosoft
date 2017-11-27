<?php

namespace App\Http\Controllers\group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
use Flashy;
use Image;
use App\Post;
use App\User;
class GroupPostController extends Controller
{
    //

    public function create_post_view($group_id){

      $group=Group::findOrFail($group_id);

      return view('groups.manage.post_create')->with('group',$group);

    }


public function store(Request $request){

$this->validate($request,[
  'title'=> 'required|max:50',
   'body'=> 'required|max:255',
'image' => 'mimes:jpeg,png,gif,bmp',


]);

       if($request->hasFile('image')) {
    $image =  $request->file('image');
    $filename = time() . '.' . $image->getClientOriginalExtension();
  Image::make($image)->resize(500, 500)->save(public_path('storage/post_images/' .  $filename));

        }

  //       $post=Post::create([
  //         'title'=>$request->title,
  //         'body'=>$request->body,
  //         'image'=>$filename,
  //         'group_id'=> $request->group_id,
  //         'user_id'=> $request->user_id
  // ]);
  $user= User::findOrFail( $request->user_id);

$group=Group::findOrFail($request->group_id);
  $post=new Post();
  $post->title=$request->title;
  $post->body=$request->body;
  $post->image=$filename;
  $post->group_id= $request->group_id;
  $post->user_id=$request->user_id;
  $post->save();

  if($post){

$user->posts()->save($post);
$group->posts()->save($post);
// $group_post_user=$user_post->posts()->save($post->id);
      Flashy::success('Post created successfully!');
      return redirect()->back();
  }
  else {

    Flashy::warning('Error inserting post!');
    return redirect()->back();

  }

}

}
