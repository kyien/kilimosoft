<?php

namespace App\Http\Controllers\group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Group;
use Auth;
use App\Produce;
use App\Tools;
use PDF;
use App\ToolRecord;
use App\UserProduce;
use Illuminate\Support\Facades\View;
class ReportsController extends Controller
{
    //

    public function farmers_report_per_group($user_id,$group_id){
$group=Group::findOrFail($group_id);

$results= DB::table('usersproduce')->where([['user_id',$user_id],['group_id',$group_id]])->get();


         return View::make('groups.reports.farmersreport',compact('group','results'));
    }



    public function farmers_report_all_groups($user_id){

  $results= DB::table('usersproduce')->where('user_id',$user_id)->get();


         return View::make('groups.reports.farmers_reports_all',compact('results'));
    }


  
    public function group_produce_report($group_id){

      $group=Group::findOrFail($group_id);

      $results= DB::table('usersproduce')->where('group_id',$group_id)->get();

         return View::make('groups.reports.group_produce_report',compact('group','results'));
     }



     public function group_users_report($group_id){

       $group=Group::findOrFail($group_id);

      $results= $group->users()->get();


         return view('groups.reports.group_user_report',compact('group','results'));
      }


      public function product_prices($group_id){

             $group=Group::findOrFail($group_id);
        $results=DB::table('prices')->get();


return view('groups.reports.product_prices_report',compact('group','results'));

      }


      public function group_tool_report($group_id)
       {

          $group=Group::findOrFail($group_id);
          $result=$group->tools()->get();

          return view('groups.reports.group_tool',compact('group','results'));
       }


       public function group_inventory_report($group_id)
        {

            $group=Group::findOrFail($group_id);
          //  $result=Group::where('group_id',$group_id);

           return view('groups.reports.group_inventory',compact('group'));
        }

        
        public function custom_form_search($group_id){

          $group=Group::findOrFail($group_id);

          return view('groups.reports.custom_form_search',compact('group'));


        }
        public function form_query(Request $r){
         //dd($r->from_search);

          $this->validate($r,[
            'report_type'=>'required',
            'from_search'=>'required',
            'to_search'=> 'required'
          ]);

          $type=$r->report_type;
          $from=date('Y-m-d', strtotime($r->from_search));
          $to=date('Y-m-d', strtotime($r->to_search));
          $user_id=Auth::user()->id;
          $group_id=$r->group_id;

//dd($from);
$group=Group::findOrFail($group_id);
    if($type=='produce'){

      $res= DB::table('usersproduce')->where([['user_id',$user_id],['group_id',$group_id]])->whereBetween('created_at',[$from,$to])->get();
//dd($res);

return view('groups.reports.custom_produce_res',compact('res','group','from','to'));

    }else{

      $res=DB::table('tool_request')->where([['user_id',$user_id],['group_id',$group_id]])->limit(3)->get();

      return view('groups.reports.custom_tool_res',compact('res','group','from','to'));

    }




        }


}
