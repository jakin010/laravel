<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read Bewoner $bewoners
 */
class Rit extends Model
{
//    use HasFactory;

    protected $table = 'ritten';

    protected $fillable = ['bewoner_id', 'kilometer', 'date_of_rit'];

    public function bewoner(): BelongsTo
    {
        return $this->belongsTo(Bewoner::class, 'bewoner_id');
    }
}
