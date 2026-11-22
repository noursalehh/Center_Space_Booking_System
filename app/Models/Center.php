<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $fillable = [
        
        'name',
        'description',
        'address',
        'city',
        'country',
        'contact_number',
        'status',

    ];

    public function spaces(){
        return $this->hasMany(Space::class);
    }
}
