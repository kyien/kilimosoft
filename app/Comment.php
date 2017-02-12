<?php

namespace App;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //


  protected $fillable = ['post_id', 'user_id', 'body'];



}
