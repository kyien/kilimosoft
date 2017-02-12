<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Sale extends Model
{
    //

    protected $fillable=[
          'quantity',
          'crop_id',
          'group_id',
          'buyer_id',
          'amount_per_unit'


    ];


    protected $table='sales';


}
