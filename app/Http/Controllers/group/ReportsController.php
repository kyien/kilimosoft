<?php

namespace App\Http\Controllers\group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Group;
use Vsmoraes\Pdf\Pdf;
use Illuminate\Support\Facades\View;
class ReportsController extends Controller
{
    //
 private $pdf;



 public function __construct(Pdf $pdf)
   {
       $this->pdf = $pdf;
   }


    public function farmers_report($id){
       $group=Group::findOrFail($id);

$results= DB::table('members_details')->get();


         return View::make('groups.reports.farmersreport',compact('group','results'));
    }

    public function group_produce_report($id){

      $group=Group::findOrFail($id);

     $results= DB::table('total_produce_per_group')->get();

         return View::make('groups.reports.group_produce_report',compact('group','results'));
     }

     public function bidding(){

       $group=Group::all();

      $results= DB::table('')->get();


         return view('groups.reports.group_produce_report',compact('group','results'));
      }

      public function pdf_group_report()
       {


           $html = View::make('groups.reports.group_produce_report')->render();

           return $this->pdf
               ->load($html)
               ->show();
       }



}
