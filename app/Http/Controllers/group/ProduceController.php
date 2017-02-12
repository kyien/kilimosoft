<?php

namespace App\Http\Controllers\group;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
 use Flashy;
 use Illuminate\Support\Facades\Input;
use Validator;
use App\Produce;
use App\User;
use Charts;
use App\Group;
use App\Userproduce;
class ProduceController extends Controller
{
    //

    public function index($id) {

      $group=DB::table('groups')->where('id',$id)->first();
      $groupusers = Group::with('users')->findOrFail($id);
     $grouproduces= Group::with('produces')->findOrFail($id);

          return view('groups.produce',compact('group','groupusers','grouproduces'));
                  }

    public function store(Request $request,$id){
      $this->validate($request,[
          'quantity' => 'required|numeric|max:255',
          'produce'=> 'required'
        ]);

     Userproduce::create([
      'quantity' => $request->quantity,
      'user_id' => $request->member,
      'produce_name'=>$request->produce,
      'units'=>$request->units,
      'group_id' => $id,
   ]);
        $produceid=$request->produce_id;
        $user=Auth::user();
   $users_produce=$user->produces()->attach($produceid,['group_id'=>$id]);

     Flashy::info('Produce Recorded!');

    return redirect()->back();

    }

    public function produce_chart($id){

     $group=DB::table('groups')->where('id',$id)->first();
     $chart=Charts::database(Produce::all(), 'pie', 'highcharts')
             ->title('All Produce')
             ->dimensions(1000, 500)
             ->responsive(true)
             ->groupBy('name');

       return view('groups.viewproduce',compact('chart','group'));
     }

     public function getinfo(Request $request){
       $id=$request->id;
       //dd($id);
       $fill = DB::table('produces')->where('id', $id)->pluck('units');
//dd($fill);
         return response()->json(['success'=>true, 'info'=>$fill]);

     }


}
