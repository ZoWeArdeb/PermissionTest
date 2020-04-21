<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function users()
    {
        return $this->hasManyThrough(
            User::class,
            Member::class,
            'group_id',
            'user_id',
            'id',
            'group_id'
        );
    }
}
