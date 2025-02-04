<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_no',
        'room_title',
        'image',
        'summery',
        'description',
        'price',
        'wifi',
        'room_type'
    ];



    public function bookings()
    {
        return $this->hasMany(Booking_room::class);
    }
}
