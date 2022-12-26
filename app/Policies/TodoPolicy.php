<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;
use App\Helpers\UnifiedResponse;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoPolicy
{
    use HandlesAuthorization;

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
            : UnifiedResponse::unauthenticated()->throwResponse();
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
        return false;
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
        return false;
    }
}
