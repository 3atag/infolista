<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeIsolation extends Model
{
    const CONTACTO = 1;

    const RESPCORTO = 2;

    const RESPLARGO = 3;

    const COVID = 4;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function germs(): HasMany
    {
        return $this->hasMany(Germ::class);
    }
}
