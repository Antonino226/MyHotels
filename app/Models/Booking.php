<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';

    public function getRoomNumberAttribute()
    {
        // Ottieni la stanza associata alla prenotazione
        $room = Room::find($this->room_id);
        // Restituisci il numero della stanza
        return $room->room_number;
    }

    public function getHotelNameAttribute()
    {
        // Ottieni l'hotel associato alla stanza
        $room = Room::find($this->room_id);
        $hotel = Hotel::find($room->hotel_id);

        // Restituisci il nome dell'hotel
        return $hotel->name;
    }

    public function getUserNameAttribute()
    {
        // Ottieni l'utente associato alla prenotazione
        $user = User::find($this->user_id);

        // Restituisci il nome dell'utente
        return $user->name;
    }

    protected $fillable = [
        'check_in_date',
        'check_out_date',
        'guests_number',
        'total_payment',
        'confirmed',
    ];
}
