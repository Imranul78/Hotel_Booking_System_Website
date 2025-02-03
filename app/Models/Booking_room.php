<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_room extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'user_id',
        'name',
        'email',
        'phone',
        'start_date',
        'end_date',
        'paid_amount'
    ];



    public function room(){
        return $this->hasOne('App\Models\Room', 'id', 'room_id');
    }
}
