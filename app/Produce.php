<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produce extends Model
{
    //
    protected $fillable=[
    'name',
    'requirements'
    ];

    protected $table='produces';

    public function groups(){


return $this->belongsToMany('App\Group','group_produce','produce_id','group_id')->withTimestamps();;
    }

    public function users(){


  return $this->belongsToMany('App\User','produce_user','produce_id','user_id')->withPivot('group_id')->withTimestamps();;
    }

    public function buyers(){


  return $this->belongsToMany('App\Buyer','buyer_produce','produce_id','buyer_id')->withTimestamps();;
    }

}
