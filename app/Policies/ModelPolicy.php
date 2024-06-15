<?php

namespace App\Policies;

use App\Models\User;
use App\Models\YourModel; // Adjust the namespace if necessary
use Illuminate\Auth\Access\HandlesAuthorization;

class ModelPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, YourModel $yourModel)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, YourModel $yourModel)
    {
        //
    }

    public function delete(User $user, YourModel $yourModel)
    {
        //
    }

    public function restore(User $user, YourModel $yourModel)
    {
        //
    }

    public function forceDelete(User $user, YourModel $yourModel)
    {
        //
    }
}
