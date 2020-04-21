<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function classes()
    {
        return $this->belongsToMany(IClass::class, 'students');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    //
    public function groups()
    {
        return $this->hasMany(Group::class)
        ->using(Member::class);
    }
    

    public function permissions()
    {
        return $this->hasManyThrough(
            Permission::class,          // The model to access to
            Member::class, // The intermediate table that connects the User with the Podcast.
            'user_id',                 // The column of the intermediate table that connects to this model by its ID.
            'group_id',              // The column of the intermediate table that connects the Podcast by its ID.
            'id',                      // The column that connects this model with the intermediate model table.
            'group_id'               // The column of the Audio Files table that ties it to the Podcast.
        );
    }
}
