<?php

namespace App\Http\Traits;

use Spatie\Permission\Models\Role;

trait RoleTrait
{
    public function getRoles()
    {
        return Role::query();
    }
    public function getRole($role_id)
    {
        return Role::find($role_id);
    }

}
