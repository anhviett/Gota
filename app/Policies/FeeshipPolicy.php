<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeeshipPolicy
{
    use HandlesAuthorization;

    public function view(user $user)
    {
        return $user->checkPermissionAccess('feeship_view');
    }

    public function create(user $user)
    {
        return $user->checkPermissionAccess('feeship_create');
    }

    public function update(user $user)
    {
        return $user->checkPermissionAccess('feeship_edit');
    }

    public function delete(user $user)
    {
        return $user->checkPermissionAccess('feeship_delete');
    }
    public function __construct()
    {
        //
    }
}
