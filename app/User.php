<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cmgmyr\Messenger\Traits\Messagable;
use Auth;
//use GeniusTS\Roles\Traits\HasRoleAndPermission;
//use GeniusTS\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Passwords\CanResetPassword;
class User extends Authenticatable
{
       use Notifiable,Messagable,CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'username','phoneNo', 'email', 'password','location','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){

      return $this->hasOne('App\Profile');
    }

    public function groups(){

return $this->belongsToMany('App\Group','group_user','user_id','group_id')->withPivot('role','approved')->withTimestamps();;
    }

    public function produces(){

      return $this->belongsToMany('App\Produce','produce_user','user_id', 'produce_id')->withPivot('group_id')->withTimestamps();
    }

    public function posts(){

      return $this->hasMany('App\Post');
    }

    public function tools(){

      return $this->belongsToMany('App\Tool','tool_member','user_id','tool_id')->withTimestamps();
    }

    public function checkRole($user_role,$group_id,$user_id){

      // $role= $this->groups()
      //             ->join('group_user','group_user.role', '=', $user_role)
      //             ->where('group_user.group_id','=',$group_id )->get();

    $role=DB::table('group_user')->where([['group_id',$group_id],['user_id','=',$user_id]])->pluck('role')->first();


                  if($role==$user_role){

                    return true;
                  }

                    return false;
                    }

  public function hasGroup($user_id){

            $query=DB::table('group_user')->where('user_id',$user_id)->exists();
             if($query){
               return true;
             }
            else {
              return false;
            }
    }



}
