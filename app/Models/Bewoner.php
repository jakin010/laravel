<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read Parceel $parceel
 * @property-read Beschikking $beschikking
 * @property-read array<Rit> $ritten
 */
class Bewoner extends Model
{
    use HasFactory;

    protected $table = 'bewoners';

    public function parceel(): BelongsTo
    {
        return $this->belongsTo(Parceel::class);
    }

    public function beschikking(): BelongsTo
    {
        return $this->belongsTo(Beschikking::class);
    }

    public function ritten(): HasMany
    {
        return $this->hasMany(Rit::class, 'bewoner_id');
    }
}
