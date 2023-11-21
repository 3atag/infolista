<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $with = [
        'roles',
        'permissions'
    ];


    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function studies(): HasMany
    {
        return $this->hasMany(Study::class);
    }

    /* Le pasamos el nombre de un roly nos dice si el usuario tiene asignado ese rol o no*/
    public function hasRole(string $role): bool
    {
        return $this->roles->contains('name', $role);
    }

    /* Le pasamos el nombre de un permiso y nos dice si el usuario tiene asignado ese permiso o no*/
    public function hasPermission(string $permission): bool
    {
        return $this->permission->contains('name', $permission);
    }

    /* Le pasamos varios nombres de roles y nos dice si el usuario tiene asignado alguno de esos*/
    public function hasAnyRole(array $roles): bool
    {
        return $this->roles->whereIn('name', $roles)->isNotEmpty();
    }

    /* Determina si el usuario tiene asignado algun rol */
    public function hasRoles(): bool
    {
        return $this->roles->isNotEmpty();
    }
}
