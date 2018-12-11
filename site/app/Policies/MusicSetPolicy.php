<?php

namespace App\Policies;

use App\User;
use App\MusicSet;
use Illuminate\Auth\Access\HandlesAuthorization;

class MusicSetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the form for creating a new music set.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can store music sets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function store(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the music set.
     *
     * @param  \App\User  $user
     * @param  \App\MusicSet  $musicSet
     * @return mixed
     */
    public function view(User $user, MusicSet $musicSet)
    {
        return $user->id == $musicSet->user_id;
    }

    /**
     * Determine whether the user can view the form for editing the music set.
     *
     * @param  \App\User  $user
     * @param  \App\MusicSet  $musicSet
     * @return mixed
     */
    public function edit(User $user, MusicSet $musicSet)
    {
        return $user->id == $musicSet->user_id;
    }

    /**
     * Determine whether the user can update the music set.
     *
     * @param  \App\User  $user
     * @param  \App\MusicSet  $musicSet
     * @return mixed
     */
    public function update(User $user, MusicSet $musicSet)
    {
        return $user->id == $musicSet->user_id;
    }

    /**
     * Determine whether the user can destroy the music set.
     *
     * @param  \App\User  $user
     * @param  \App\MusicSet  $musicSet
     * @return mixed
     */
    public function destroy(User $user, MusicSet $musicSet)
    {
        return $user->id == $musicSet->user_id;
    }

    /**
     * Determine whether the user can restore the music set.
     *
     * @param  \App\User  $user
     * @param  \App\MusicSet  $musicSet
     * @return mixed
     */
    public function restore(User $user, MusicSet $musicSet)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the music set.
     *
     * @param  \App\User  $user
     * @param  \App\MusicSet  $musicSet
     * @return mixed
     */
    public function forceDelete(User $user, MusicSet $musicSet)
    {
        return false;
    }
}
