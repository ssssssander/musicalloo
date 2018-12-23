<?php

namespace App\Policies;

use App\User;
use App\Marker;
use Illuminate\Auth\Access\HandlesAuthorization;

class MarkerPolicy
{
    use HandlesAuthorization;


    public function create(User $user)
    {
        return true;
    }


    public function store(User $user)
    {
        return true;
    }


    public function view(User $user, Marker $marker)
    {
        return $user->id == $marker->user_id;
    }


    public function edit(User $user, Marker $marker)
    {
        return $user->id == $marker->user_id;
    }


    public function update(User $user, Marker $marker)
    {
        return $user->id == $marker->user_id;
    }


    public function destroy(User $user, Marker $marker)
    {
        return $user->id == $marker->user_id;
    }


    public function restore(User $user, Marker $marker)
    {
        return false;
    }

    
    public function forceDelete(User $user, Marker $marker)
    {
        return false;
    }
}
