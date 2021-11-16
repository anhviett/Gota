<?php

namespace App\Policies;

use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductCategoryPolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->checkPermissionAccess('product_categories_view');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('product_categories_create');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('product_categories_edit');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('product_categories_delete');
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
