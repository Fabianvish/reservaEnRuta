<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    protected $fillable = ['name', 'origin', 'tour_location', 'kms', 'start', 'end', 'adult_price', 'children_price', 'third_age_price', 'prefix' ];

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }

}
