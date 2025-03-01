<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Passenger extends Model
{
    protected $fillable = ['run', 'name', 'residence','phone','email'];


    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

}
