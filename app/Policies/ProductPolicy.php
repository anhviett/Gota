<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->checkPermissionAccess('products_view');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('products_create');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('products_edit');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('products_delete');
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
