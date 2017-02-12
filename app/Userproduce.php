<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userproduce extends Model
{
    //



    protected $table='usersproduce';

    protected $fillable=[
      'user_id',
      'quantity',
      'produce_name',
      'group_id',
      'units',

    ];
}
