<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Fblist;
use Illuminate\Auth\Access\HandlesAuthorization;

class FblistPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the fblist.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Fblist  $fblist
     * @return mixed
     */
    public function view(User $user, Fblist $fblist)
    {
        //
    }

    /**
     * Determine whether the user can create fblists.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the fblist.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Fblist  $fblist
     * @return mixed
     */
    public function update(User $user, Fblist $fblist)
    {
        //
    }

    /**
     * Determine whether the user can delete the fblist.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Fblist  $fblist
     * @return mixed
     */
    public function delete(User $user, Fblist $fblist)
    {
        //
    }
}
