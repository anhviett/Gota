<?php

namespace App\Policies;

use App\Models\user;
use Illuminate\Auth\Access\HandlesAuthorization;

class SizePolicy
{
    use HandlesAuthorization;
    public function view(user $user)
    {
        return $user->checkPermissionAccess('sizes_view');
    }

    public function create(user $user)
    {
        return $user->checkPermissionAccess('sizes_create');
    }

    public function update(user $user)
    {
        return $user->checkPermissionAccess('sizes_edit');
    }

    public function delete(user $user)
    {
        return $user->checkPermissionAccess('sizes_delete');
    }
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
