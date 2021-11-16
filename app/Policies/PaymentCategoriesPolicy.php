<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentCategoriesPolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->checkPermissionAccess('payment_categories_view');
    }
    public function create(User $user)
    {
        return $user->checkPermissionAccess('payment_categories_create');
    }
    public function update(User $user)
    {
        return $user->checkPermissionAccess('payment_categories_edit');
    }
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('payment_categories_delete');
    }
    public function __construct()
    {
        //
    }
}
