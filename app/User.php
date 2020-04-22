<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

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
        return DB::table('users')
        ->join('group_user', 'users.id', '=', 'group_user.user_id')
        ->join('groups', 'group_user.group_id', '=', 'groups.id')
        ->join('group_permission', 'groups.id', '=', 'group_permission.group_id')
        ->join('permissions', 'group_permission.permission_id', '=', 'permissions.id')
        ->select('permissions.*')->where('users.id', '=', $this->id)->get();
    }
}
