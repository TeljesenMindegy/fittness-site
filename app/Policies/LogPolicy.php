<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any training dates.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the training date.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $trainingDate
     * @return mixed
     */
    public function view(User $user, Appointment $trainingDate)
    {
        //
    }

    /**
     * Determine whether the user can create training dates.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the training date.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $trainingDate
     * @return mixed
     */
    public function update(User $user, Appointment $trainingDate)
    {
        //
    }

    /**
     * Determine whether the user can delete the training date.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $trainingDate
     * @return mixed
     */
    public function delete(User $user, Appointment $trainingDate)
    {
        //
    }

    /**
     * Determine whether the user can restore the training date.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $trainingDate
     * @return mixed
     */
    public function restore(User $user, Appointment $trainingDate)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the training date.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $trainingDate
     * @return mixed
     */
    public function forceDelete(User $user, Appointment $trainingDate)
    {
        //
    }
}
