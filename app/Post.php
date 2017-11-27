<?php

namespace App;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
protected $table='posts';


protected $fillable=[
  'title',
  'body',
  'user_id',
  'image',
  'group_id'
];

public function groups(){

  return $this->belongsTo('App\Group');

}

public function users(){

  return $this->belongsTo('App\User');
}



}
