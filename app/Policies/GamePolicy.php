<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Game;
use Illuminate\Auth\Access\Response;

class GamePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Game $game): Response
    {
        return $user->subs === 1
            ? Response::allow()
            : Response::deny('You do not have permission to update this game.');
    }

    public function delete(User $user, Game $game): Response
    {
        return $user->subs === 1
            ? Response::allow()
            : Response::deny('You do not have permission to update this game.');
    }
}
