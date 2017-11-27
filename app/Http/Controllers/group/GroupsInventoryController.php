<?php

namespace App\Http\Controllers\group;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
use App\Tool;
use Auth;
use Illuminate\Support\Facades\DB;
use Flashy;
use App\ToolRecord;

class GroupsInventoryController extends Controller
{
    //
// private $group=;
//
// public function __construct(){
//
//   $this
// }

public function group_tool_register_form($group_id){
    $group=Group::findOrFail($group_id);
    $tools=Tool::all();
    //dd($tools);
return view('groups.inventory.tool_register_form',compact('tools','group'));

}

public function group_tool_edit_form($group_id){
    $group=Group::findOrFail($group_id);
    $tools=$group->tools()->get();
    //dd($tools);
return view('groups.inventory.tool_edit_form',compact('tools','group'));

}

public function tool_update_info(Request $request){

  list($data1,$data2)=explode('|',$request->id);

  //dd($id);
  $no = DB::table('tool_records')->where([['tool_id', $data1],['group_id',$data2]])->pluck('quantity');
 //dd($fill);
    return response()->json(['success'=>true, 'toolinfo'=>$no]);

}

  public function group_tool_update(Request $r){



  $this->validate($r,[
        'quantity' => 'required|numeric|integer|min:1',
        'update_tool'=> 'required',
  ]);

    list($data1,$data2)=explode('|',$r->update_tool);
  $new_quantity=$r->quantity;
  $old_quantity=ToolRecord::where([['tool_id', $data1],['group_id',$data2]])->pluck('quantity')->first();
  $old_available_quantity=ToolRecord::where([['tool_id', $data1],['group_id',$data2]])->pluck('available_quantity')->first();

  $difference=  $new_quantity-$old_quantity;
  $new_available_quantity=  $old_available_quantity+$difference;
  //dd($old_quantity);

$toolrecord= DB::table('tool_records')->where([['tool_id', $data1],['group_id',$data2]])->update([
  'quantity'=>$new_quantity ,
  'available_quantity'=>  $new_available_quantity
]);

//dd($toolrecord);

if($toolrecord){

  Flashy::success('Tool(s) successfully updated!');

  return redirect()->back();

}else{

  Flashy::warning('tool update failed!');

  return redirect()->back();
}


  }


public function group_tool_record(Request $r){

    $group=Group::findOrFail($r->group_id);

  $this->validate($r,[
        'quantity' => 'required|numeric|integer|min:1',
        'tool'=> 'required',
  ]);

list($data1,$data2)=explode('|',$r->tool);
    ToolRecord::create([
'tool_id'=>$data1,
'tool_name'=>$data2,
'quantity'=>$r->quantity,
'available_quantity'=>$r->quantity,
'group_id'=>$r->group_id,
'available'=>true

    ]);

    $tool_id=$data1;

$group_tool=$group->tools()->attach($tool_id);
Flashy::success('Tool(s) successfully Recorded!');

return redirect()->back();


}

public function tool_search_form($group_id){

    $group=Group::findOrFail($group_id);
        $tools=$group->tools()->get();


return view('groups.inventory.tool_search_form',compact('tools','group'));

}

  public function tool_search_results(Request $r){

  list($data1,$data2)=explode('|',$r->id);
$group_id=$data2;
// dd($group_id);
$tool_id=$data1;
// dd($tool_id);
 $res=ToolRecord::where([['tool_id','=',$tool_id],['group_id','=',$group_id]])->pluck('available_quantity')->first();
//dd($res);
  if($res < 1 ){


    return response()->json(['success'=>true, 'info'=>0]);
  }
else{

    return response()->json(['success'=>true, 'info'=>$res]);
}


    }

    public function tool_request(Request $r){
//dd($r->available);
      $this->validate($r,[
        'tool_search'=> 'required',
        'req_quantity'=>"required|numeric|integer|min:1|max:$r->available"
      ]);

            list($data1,$data2,$data3)=explode('|',$r->tool_search);
            $tool_id=$data1;
            $group_id=$data2;
            $tool_name=$data3;
            $user_id=Auth::user()->id;



          $insert1 = DB::table('tool_request')->insert([
              'user_id'=>$user_id,
              'tool_name'=>$tool_name,
              'tool_id'=>$tool_id,
              'group_id'=>$data2,
              'quantity'=>$r->req_quantity

            ]);
            $req_quantity=$r->req_quantity;
            $old_available_quantity=ToolRecord::where([['tool_id','=',$tool_id],['group_id','=',$group_id]])->pluck('available_quantity')->first();
            $new_available_quantity=  $old_available_quantity-  $req_quantity;

            $insert2=ToolRecord::where([['tool_id','=',$tool_id],['group_id','=',$group_id]])->update(['available_quantity'=> $new_available_quantity]);

            if($insert1 && $insert2){

              Flashy::success('Your request has been received we shall notify you on the next step');

              return redirect()->back();

            }else{

              Flashy::warning('Error receiving your request for selected tool request!');

              return redirect()->back();
            }

    }


}
