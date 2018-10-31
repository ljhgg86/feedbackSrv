<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Fbcontent;
use Illuminate\Auth\Access\HandlesAuthorization;

class FbcontentPolicy
{
    use HandlesAuthorization;

    public function before(User $user, Fbcontent $fbcontent)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }
    /**
     * Determine whether the user can view the fbcontent.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Fbcontent  $fbcontent
     * @return mixed
     */
    public function view(User $user, Fbcontent $fbcontent)
    {
        return $user->hasPolicy('allFblistsPolicy');
    }

    /**
     * Determine whether the user can create fbcontents.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the fbcontent.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Fbcontent  $fbcontent
     * @return mixed
     */
    public function update(User $user, Fbcontent $fbcontent)
    {
        //
    }

    /**
     * Determine whether the user can delete the fbcontent.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Fbcontent  $fbcontent
     * @return mixed
     */
    public function delete(User $user, Fbcontent $fbcontent)
    {
        //
    }
}
