<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BannerPolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->checkPermissionAccess('banner_view');
    }
    public function create(User $user)
    {
        return $user->checkPermissionAccess('banner_create');
    }
    public function update(User $user)
    {
        return $user->checkPermissionAccess('banner_edit');
    }
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('banner_delete');
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
