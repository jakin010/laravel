<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read Taxibedrijf $taxibedrijf
 * @property-read Parceel $parceel
 */
class TaxibedrijfParceelVerantwoordelijk extends Model
{
    use HasFactory;

    protected $table = 'taxibedrijf_parceel_verantwoordelijk';

    public function parceel(): BelongsTo
    {
        return $this->belongsTo(Parceel::class);
    }

    public function taxibedrijf(): BelongsTo
    {
        return $this->belongsTo(Taxibedrijf::class);
    }
}
