<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToolRecord extends Model
{
    //
    protected $table='tool_records';

    protected $fillable=[
      'tool_name',
      'group_id',
      'tool_id',
      'quantity',
      'available_quantity'
    ];

}
