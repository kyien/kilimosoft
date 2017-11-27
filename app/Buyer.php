<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    //
    protected $table='buyers';
    protected $fillable=[

        'firstname',
        'lastname',
        'location',
        'cropsofinterest',
        'avatar'
      ];

      // public function groups(){
      //
      //   return $this->belongsToMany(Group::class);
      // }

      public function produces(){

        return $this->belongsToMany('App\Produce','buyer_produce','buyer_id', 'produce_id')->withTimestamps();
      }


}
