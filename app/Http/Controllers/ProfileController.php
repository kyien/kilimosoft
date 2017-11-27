<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Profile;
use Auth;
use Validator;
use Image;
use Flashy;
use Session;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{

    public function index($username)
    {
        //
        $user= User::where('username',$username)->first();
        return view('profile.profile')->with('user',$user);
    }



    public function edit()
    {
        //
       $user= Auth::user();
         return view('profile.edit_profile')->with('profile', $user->profile);
    }


    public function update(Request $request)
    {
        //
      //  dd($request->all());
        $this->validate($request,
        [
          'about' => 'max:255',
          'crops' => 'max:255',

        'username' => 'max:50|min:6',
        ]);


        if($request->hasFile('avatar')){
            $avatar =  $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
          Image::make($avatar)->resize(500, 500)->save(public_path('storage/users_avatars/' .  $filename));

Auth::user()->update([  'avatar'  =>   $filename]);
  }
//  dd($filename);
        Auth::user()->profile()->update([
          'about' => $request->about,
          'crops' => $request->crops
                ]);


        Auth::user()->update([
          'location' => $request->location,
          'username' => $request->username,



                ]);

                Flashy::success('Profile Updated successfully!');

                return redirect()->back();

    }


    public function destroy($id)
    {
        //
    }
}
