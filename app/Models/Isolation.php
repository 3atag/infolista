<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Isolation extends Model
{
    protected $fillable = [
        'patient_id',
        'germ_id',
        'detection_date',
        'admitted'
    ];

    protected $casts = [
        'admitted' => 'boolean',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function germ(): BelongsTo
    {
        return $this->belongsTo(Germ::class);
    }

    public function type_isolation()
    {
        return $this->hasManyThrough(TypeIsolation::class, Germ::class);
    }
}
