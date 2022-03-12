<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function submit(User $user, Post $post)
    {
        return $user->id === $post->users_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    public function published(?User $user, Post $post)
    {
        return $post->status == 1
            ? Response::allow()
            : Response::deny('Post not publised');
        
    }
}
