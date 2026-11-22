<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type',
        'maximum_capacity',
        'hourly_price',
        'center_id',
        'status',
    ];
    public function center(){
        return $this->belongsTo(Center::class);

    }
    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
