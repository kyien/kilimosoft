<?php

namespace App\Http\Controllers;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Groups;
use App\Produce;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//  $produces=DB::table('produce')->get();
$produces= Produce::all();

        return view('home')->with('produces',$produces);
    }


}
