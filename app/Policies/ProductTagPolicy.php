<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductTagPolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->checkPermissionAccess('product_tags_view');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('product_tags_create');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('product_tags_edit');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('product_tags_delete');
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
