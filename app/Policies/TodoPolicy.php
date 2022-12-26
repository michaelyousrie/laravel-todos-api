<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;
use App\Helpers\UnifiedResponse;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoPolicy
{
    use HandlesAuthorization;

    // Here, we're sending Not Found (404) instead of Unauthroized (401) to protect the state of our database.
    // We don't want a malicious guy to know that there's a todo that exists with a specific ID..
    // when a request is sent to a Todo that isn't owned by the currently logged in user.

    // It's confusing a bit but a regular user shouldn't care if they're unauthorized to view the note or it doesn't exist.

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Todo $todo)
    {
        return $user->id === $todo->user_id ?
            self::allow()
            : UnifiedResponse::notFound()->throwResponse();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Todo $todo)
    {
        return $user->id === $todo->user_id ?
            self::allow()
            : UnifiedResponse::notFound()->throwResponse();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Todo $todo)
    {
        return $user->id === $todo->user_id ?
            self::allow()
            : UnifiedResponse::notFound()->throwResponse();
    }
}
