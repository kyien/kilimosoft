<?php

namespace Musonza\Groups\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
class User extends Authenticatable
{

  use  CanResetPassword;
    /**

     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'username','phoneNo', 'email', 'password','location','avatar',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_user');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }
}
