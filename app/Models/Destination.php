<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    protected $guarded = [];

    /**
     * Get all of the comments for the Destination
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }

}
