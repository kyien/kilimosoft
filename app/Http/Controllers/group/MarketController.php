<?php

namespace App\Http\Controllers\group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Price;
use Illuminate\Support\Facades\DB;
use Charts;

class MarketController extends Controller
{
    //


public function price_chart($id){

$group=DB::table('groups')->where('id',$id)->first();
$chart=Charts::database(Price::all(), 'line', 'highcharts')
        ->title('All Sales')
        ->dimensions(1000, 500)
        ->responsive(true)
        ->groupBy('crop_id');
//dd($group);
  return view('groups.price_data',compact('group','chart'));
}







}
