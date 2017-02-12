<?php

namespace App\Http\Controllers\group;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Sale;
use Charts;
class SalesController extends Controller
{
    //


public function index($id){
    $group=DB::table('groups')->where('id',$id)->first();
//$chart = Charts::database(sales::all(), 'bar', 'highcharts')->dateFormat('j F y');
$chart=Charts::database(Sale::all(), 'bar', 'highcharts')
        ->title('All Sales')
        ->dimensions(1000, 500)
        ->responsive(true)
        ->groupBy('group_id');

  return view('groups.sales',compact('chart','group'));
}


}
