<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $table='inventories';

    protected $fillable=[
      'tool_name',
      'available',
      'user_id',
      'group_id',
    ];

    
}
