<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    //

    protected $fillable=[

        'firstname',
        'lastname',
        'location',
        'cropsofinterest',
        'avatar'
      ];

      public function groups(){

        return $this->belongsToMany(Group::class);
      }
}
