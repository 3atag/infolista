<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    const ADMIN = 1;

    const INFECTOLOGO = 2;

    const SUPERVISOR = 3;

    const PROFESIONAL = 4;

    const ADMINISTRATIVO = 5;



    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
