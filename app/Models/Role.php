<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{

    const ADMIN = 1;

    const PROFESIONAL = 2;

    const ADMINISTRATIVO = 3;

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
