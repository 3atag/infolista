<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'DNI',
        'HC'
    ];

    public function isolations(): HasMany

    {
        return $this->hasMany(Isolation::class);
    }
}
