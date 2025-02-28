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

    public function scopeRole($query, $role)
    {
        return $query->whereHas('roles', function ($q) use ($role) {
            $q->where('name', $role);
        });
    }

    public function scopeWithoutRole($query, $role)
    {
        return $query->whereDoesntHave('roles', function ($q) use ($role) {
            $q->where('name', $role);
        });
    }

    public function scopePermission($query, $permission)
    {
        return $query->whereHas('permissions', function ($q) use ($permission) {
            $q->where('name', $permission);
        })->orWhereHas('roles.permissions', function ($q) use ($permission) {
            $q->where('name', $permission);
        });
    }

    public function scopeWithoutPermission($query, $permission)
    {
        return $query->whereDoesntHave('permissions', function ($q) use ($permission) {
            $q->where('name', $permission);
        })->whereDoesntHave('roles.permissions', function ($q) use ($permission) {
            $q->where('name', $permission);
        });
    }
}
