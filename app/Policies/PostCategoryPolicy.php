<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostCategoryPolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->checkPermissionAccess('post_categories_view');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('post_categories_create');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('post_categories_edit');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('post_categories_delete');
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
