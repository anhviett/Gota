<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderPolicy
{
    use HandlesAuthorization;

    public function view(user $user)
    {
        return $user->checkPermissionAccess('sliders_view');
    }

    public function create(user $user)
    {
        return $user->checkPermissionAccess('sliders_create');
    }

    public function update(user $user)
    {
        return $user->checkPermissionAccess('sliders_edit');
    }

    public function delete(user $user)
    {
        return $user->checkPermissionAccess('sliders_delete');
    }
    public function __construct()
    {
        //
    }
}
