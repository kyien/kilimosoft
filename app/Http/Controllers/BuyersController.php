<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Buyer;
use Validator;
use Image;
use Flashy;
use App\Produce;

class BuyersController extends Controller
{
    //

      public function index(){

        $produces= Produce::all();

        return view('buyers')->with('produces',$produces);
      }

      public function store(Request $request){

$validate=$this->validate($request,[
  'firstname' => 'required|alpha|max:255',
  'lastname' => 'required|alpha|max:255',
  'location'  => 'required|max:255',
  'cropsofinterest'=> 'required|max:255',
  'avatar' => 'required|mimes:jpeg,png,gif,bmp|max:500kilobytes',
 'phone_no' => 'required|phone:LENIENT,KE,fixed_line,mobile|unique:buyers',
 'email' => 'required|email|max:255|unique:buyers'
]);

              if(!$validate){

                return redirect()->back()->withErrors($validate);
                 }

            if($request->hasFile('avatar')){
                $image =  $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
              Image::make($image)->resize(500, 500)->save(public_path('storage/buyers_avatars/' .  $filename));
            }

                    else {
                      $buyer=Buyer::create([
                        'firstname'=> $request->firstname,
                        'lastname'=>$request->lastname,
                        'location'=>$request->location,
                        'cropsofinterest'=>$request->cropsofinterest,
                        'phone_no' => $request->phone,
                        'email'=>$request->email,

                ]);


                return view('bid')->with('buyer',$buyer);
                    }

      }




}
