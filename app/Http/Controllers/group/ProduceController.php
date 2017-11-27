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
use Auth;
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

    public function store(Request $request){

   $this->validate($request,[
          'quantity' => 'required|numeric|integer|min:1',
          'produce'=> 'required',
          'member'=>'required',
          'units'=>'required'
        ]);


        list($data1,$data2)=explode('|',$request->member);
        list($p1,$p2)=explode('|',$request->produce);


    $product= Userproduce::create([
      'quantity' => $request->quantity,
      'user_id' => $data1,
      'member_name'=>$data2,
      'produce_name'=>$p2,
      'units'=>$request->units,
      'group_id' => $request->group_id,
      'group_name'=>$request->group_name
   ]);

        // $produceid=$p1;
        // $user=Auth::user();
  //  $users_produce_insert=$user->produces()->attach($produceid,['group_id'=>$request->group_id]);
 if($product){

  return response()->json(['success'=>true, 'res'=>$product]);

 }
 else{

     return response()->json(['success'=>false]);
 }




    }

    public function produce_chart($id){

     $group=Group::findOrFail($id);
     $chart=Charts::database(UserProduce::where('group_id',$id), 'pie', 'highcharts')
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
