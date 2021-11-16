<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CouponPolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->checkPermissionAccess('coupon_view');
    }
    public function create(User $user)
    {
        return $user->checkPermissionAccess('coupon_create');
    }
    public function update(User $user)
    {
        return $user->checkPermissionAccess('coupon_edit');
    }
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('coupon_delete');
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
