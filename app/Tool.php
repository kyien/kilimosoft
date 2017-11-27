<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    //


    protected $table='tools';

    protected $fillable=[

      'toolname'
    ];



    public function groups(){

      return $this->belongsToMany('App\Group','group_tool','tool_id','group_id');
    }

    public function members(){

      return $this->belongsToMany('App\User','tool_member','tool_id','user_id')->withTimestamps();
    }
}
