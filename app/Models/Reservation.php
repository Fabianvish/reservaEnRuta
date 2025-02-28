<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $fillable = ['reservation_code', 'tour_id','passenger_id','payment_method','currency','children_count','adult_count','third_age_count'];

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }

    public function passenger(): BelongsTo
    {
        return $this->belongsTo(Passenger::class);
    }

}
