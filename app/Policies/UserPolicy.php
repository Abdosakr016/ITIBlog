<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    function adminUser(User $user, Post $post)
    {
        if ($user->role == 'admin' or $user->role == 'author' or $post->user_id == $user->id) {
            return true;
        }
        return false;
    }
}
