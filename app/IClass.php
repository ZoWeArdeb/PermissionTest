<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IClass extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany(User::class, 'students');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
