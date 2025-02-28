<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tour extends Model
{
    /**
     * Get the destination that owns the Tour
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class)->withDefault('adult_price',0)->withDefault('children_price', 0)->withDefault('third_age_price', 0);
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

}
