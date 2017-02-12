<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class infoController extends Controller
{
    //


    public function getinfo($id){
      $fill = DB::table('produces')->where('id', $id)->pluck('units');

        return response()->json(['success'=>true, 'info'=>$fill]);

    }

}
