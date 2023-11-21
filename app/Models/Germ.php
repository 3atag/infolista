<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Germ extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'type_isolation_id'
    ];

    public function isolations(): HasMany

    {
        return $this->hasMany(Isolation::class);
    }

    public function type_isolation(): BelongsTo
    {
        return $this->belongsTo(TypeIsolation::class);
    }
}
