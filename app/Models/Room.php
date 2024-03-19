<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'room';

    public function getHotelNameAttribute()
    {
        // Ottieni la stanza associata alla prenotazione
        $hotel = Hotel::find($this->hotel_id);
        // Restituisci il numero della stanza
        return $hotel->name;
    }

    protected $fillable = [
        'room_number',
        'room_type',
        'price_per_night',
        'available',
    ];
}
