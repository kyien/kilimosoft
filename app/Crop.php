<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    //



public function prices(){

  return $this->hasOne('App\Price');
}





}
