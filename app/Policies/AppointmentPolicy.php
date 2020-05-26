<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppointmentPolicy
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
        dd("viewAny");
        return true;
    }

    /**
     * Determine whether the user can view the training date.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $appointment
     * @return mixed
     */
    public function view(User $user, Appointment $appointment)
    {
        dd("view");
        return true;
        // return $user->id == $appointment->user->id;
    }

    /**
     * Determine whether the user can create training dates.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        dd("viewAny");
        return $user->hasRole('trainer');
    }

    /**
     * Determine whether the user can update the training date.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $appointment
     * @return mixed
     */
    public function update(User $user, Appointment $appointment)
    {
        dd("update");
        return $user->hasRole('trainer');
    }

    /**
     * Determine whether the user can delete the training date.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $appointment
     * @return mixed
     */
    public function delete(User $user, Appointment $appointment)
    {
        dd("delete");
        //
    }

    /**
     * Determine whether the user can restore the training date.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $appointment
     * @return mixed
     */
    public function restore(User $user, Appointment $appointment)
    {
        dd("restore");
        //
    }

    /**
     * Determine whether the user can permanently delete the training date.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $appointment
     * @return mixed
     */
    public function forceDelete(User $user, Appointment $appointment)
    {
        dd("forceDelete");
        //
    }
}
