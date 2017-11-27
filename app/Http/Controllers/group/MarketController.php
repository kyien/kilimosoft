<?php

namespace App\Http\Controllers\group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Price;
use Illuminate\Support\Facades\DB;
use Charts;
use App\Group;
use App\Produce;

class MarketController extends Controller
{
    //


public function price_chart($id){

$group=Group::findOrFail($id);
// $chart=Charts::database(Produce::all(), 'bar', 'highcharts')
//         ->title('Crop Prices')
//         ->dimensions(1000, 500)
//         ->responsive(true)
//         ->groupBy('name');

$data=Price::all();
$chart=Charts::create('bar', 'highcharts')
     ->title('Crop Prices')
     ->elementLabel('current market prices')
     ->labels($data->pluck('produce_name'))
     ->values($data->pluck('unit_price'))
       ->responsive(true);
//dd($group);
  return view('groups.price_data',compact('group','chart'));
}







}
