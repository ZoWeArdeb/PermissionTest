<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\MorphPivot;

class Member extends MorphPivot
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //
    public function groups()
    {
        return $this->belongsTo(Group::class);
    }

    public function permissions()
    {
        return $this->hasManyThrough(Permission::class, Group::class);
    }
}
