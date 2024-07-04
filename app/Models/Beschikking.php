<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Beschikking extends Model
{
    use HasFactory;

    protected $table = 'beschikkingen';

    protected $fillable = ['start_date', 'end_date', 'maximaal_kilometer'];

    public function bewoner(): HasOne {
        return $this->hasOne(Bewoner::class);
    }
}
