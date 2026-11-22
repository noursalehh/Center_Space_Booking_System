<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'booking_date',
        'start_time',
        'end_time',
        'number_of_people',
        'total_price',
        'status',
        'created_at',
        'space_id',
    ];
    public function space(){
        return $this->belongsTo(Space::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
 