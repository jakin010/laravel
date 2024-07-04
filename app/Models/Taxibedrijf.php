<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read TaxibedrijfParceelVerantwoordelijk $taxibedrijfParceelVerantwoordelijk
 */
class Taxibedrijf extends Model
{
    use HasFactory;

    protected $table = 'taxibedrijf';

    public function taxibedrijfParceelVerantwoordelijk(): HasMany
    {
        return $this->hasMany(TaxibedrijfParceelVerantwoordelijk::class);
    }
}
