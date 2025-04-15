<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'slug', 
        'description', 
        'image_path', 
        'price', 
        'location',
        'rating'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}