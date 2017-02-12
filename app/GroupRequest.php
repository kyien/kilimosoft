<?php

namespace App;

use Musonza\Groups\Models\Group;
use Illuminate\Database\Eloquent\Model;
Use Musonza\Groups\Groups;
use App\User;
class GroupRequest extends Model
{
    //
    protected $table = 'group_request';

    protected $fillable = ['user_id', 'group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
