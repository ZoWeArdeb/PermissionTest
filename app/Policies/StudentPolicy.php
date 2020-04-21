<?php

namespace App\Policies;

use App\Student;
use App\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any students.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
        $result = DB::table('users')
        ->join('group_user', 'users.id', '=', 'group_user.user_id')
        ->join('groups', 'group_user.group_id', '=', 'groups.id')
        ->join('group_permission', 'groups.id', '=', 'group_permission.group_id')
        ->join('permissions', 'group_permission.permission_id', '=', 'permissions.id')
        ->select('permissions.*')->where('users.id', '=', $user->id)->where('permissions.name', '=', 'viewAny.student')->count();
        return $result > 0
                    ? Response::allow()
                    : Response::deny("You're not allowed to view students");
    }

    /**
     * Determine whether the user can view the student.
     *
     * @param  \App\User  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function view(User $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can create students.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the student.
     *
     * @param  \App\User  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function update(User $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can delete the student.
     *
     * @param  \App\User  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function delete(User $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can restore the student.
     *
     * @param  \App\User  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function restore(User $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the student.
     *
     * @param  \App\User  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function forceDelete(User $user, Student $student)
    {
        //
    }
}
