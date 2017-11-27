<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //



    protected $table='prices';


    protected $fillable=[
      'produce_id',
      'unit_price',
      'produce_name'
    ];

    public function crops(){

      return $this->hasOne('App\Produce','produce_id');
    }
}
