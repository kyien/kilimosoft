<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Eloquent;


class Group extends Model
{
    //
use Notifiable;

protected $fillable = [
            'name',
            'user_id',
            'description',
            'short_description',
            'image',
            'private',
            'extra_info',
            'settings',
            'conversation_id',
            'location',
            'produce'
        ];

        public function users()
        {
            return $this->belongsToMany('App\User', 'group_user','group_id','user_id')->withPivot('role','approved')->withTimestamps();
        }


          public function produces(){

            return $this->belongsToMany('App\Produce','group_produce','group_id', 'produce_id')->withTimestamps();
          }

          public function posts(){

            return $this->hasMany('App\Post');
          
          }

          public function tools(){

            return $this->belongsToMany('App\Tool','group_tool','group_id','tool_id');
          }



        }
