<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property-read array<Bewoner> $bewoners
 * @property-read TaxibedrijfParceelVerantwoordelijk $taxibedrijfParceelVerantwoordelijk
 */
class Parceel extends Model
{
    use HasFactory;

    protected $table = 'parcelen';

    public function taxibedrijfParceelVerantwoordelijk(): HasOne
    {
        return $this->hasOne(TaxibedrijfParceelVerantwoordelijk::class);
    }

    public function bewoners(): HasMany {
        return $this->hasMany(Bewoner::class);
    }
}
