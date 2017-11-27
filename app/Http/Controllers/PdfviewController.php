<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Group;
use App\Produce;
use Illuminate\Support\Facades\DB;
use Auth;

class PdfviewController extends Controller
{
    //

    public function view_farmers_per_group_report($group_id){
$user_id=Auth::user()->id;
  $group=Group::findOrFail($group_id);
$results= DB::table('usersproduce')->where([['user_id',$user_id],['group_id',$group_id]])->get();

      $pdf = PDF::loadView('groups.pdf.farmersreport', ['results'=>$results,'group'=>$group]);
return $pdf->stream('farmersreport.pdf');

}
 public function receipt_generate(Request $request){
  // dd($request->all());
   $res=$request->all();

   $pdf = PDF::loadView('groups.pdf.produce_receipt',$res);
return $pdf->stream('produce_receipt.pdf');

 }


public function view_farmers_all_groups_produce_report($user_id){

$results= DB::table('usersproduce')->where('user_id',$user_id)->get();

  $pdf = PDF::loadView('groups.pdf.farmers_report_all', ['results'=>$results]);
return $pdf->stream('farmers_report_all.pdf');

}

  public function view_group_report($group_id){

    $group=Group::findOrFail($group_id);

    $results= DB::table('usersproduce')->where('group_id',$group_id)->get();

    $pdf = PDF::loadView('groups.pdf.group_produce_report', ['results'=>$results,'group'=>$group]);
return $pdf->stream('group_produce_report.pdf');


}
public function group_users_report($group_id){

  $group=Group::findOrFail($group_id);

 $results= $group->users()->get();

$pdf = PDF::loadView('groups.pdf.group_users_report', ['results'=>$results,'group'=>$group]);
    return $pdf->stream('group_users_report.pdf');
 }
 public function product_prices(){

   $results=DB::table('prices')->get();

$pdf = PDF::loadView('groups.pdf.product_prices_report', ['results'=>$results]);

 return $pdf->stream('product_prices_report.pdf');
 }
 public function form_query_produce_res($group_id,$from,$to){

$user_id=Auth::user()->id;
$group=Group::findOrFail($group_id);
$res= DB::table('usersproduce')->where([['user_id',$user_id],['group_id',$group_id]])->whereBetween('created_at',[$from,$to])->get();
$pdf = PDF::loadView('groups.pdf.custom_produce_res', ['res'=>$res,'group'=>$group,'from'=>$from,'to'=>$to]);

 return $pdf->stream('custom_produce_res.pdf');

}
 public function form_query_tool_res($group_id,$from,$to){
$user_id=Auth::user()->id;
$group=Group::findOrFail($group_id);
$res= DB::table('tool_request')->where([['user_id',$user_id],['group_id',$group_id]])->whereBetween('created_at',[$from,$to])->get();

$pdf = PDF::loadView('groups.pdf.custom_tool_res', ['res'=>$res,'group'=>$group,'from'=>$from,'to'=>$to]);

 return $pdf->stream('custom_tool_res.pdf');

}






}
