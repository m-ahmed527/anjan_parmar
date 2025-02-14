<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;

trait HasRolesAndPermissions
{
    public function roles()
    {
        return $this->morphToMany(Role::class, 'model', 'model_has_roles');
    }

    public function permissions()
    {
        return $this->morphToMany(Permission::class, 'model', 'model_has_permissions');
    }

    public function assignRole($role)
    {
        $this->roles()->syncWithoutDetaching($role);
    }

    public function revokeRole($role)
    {
        $this->roles()->detach($role);
    }

    public function hasRole($role): bool
    {
        return $this->roles->contains('name', $role);
    }

    public function hasPermission($permission): bool
    {
        // return $this->permissions()->where('name', $permission)->exists() ||
        // $this->roles()->whereHas('permissions', function ($query) use ($permission) {
        //     $query->where('name', $permission);
        // })->exists();
        return $this->permissions->contains('name', $permission) || $this->roles->pluck('permissions')->flatten()->contains('name', $permission);
    }
}
