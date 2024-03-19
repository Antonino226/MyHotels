<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Booking;
use App\Models\User;
use DB;
class HotelController extends Controller
{
    public function AllRoom()
    {
        $rooms = Room::all(); // Ottenere tutte le camere degli hotel dal database
        return view('backend.room.all_room', compact('rooms')); // Passare le camere alla vista
    }

    public function AddRoom()
    {
        $hotels = Hotel::all();
        return view('backend.room.add_room', compact('hotels')); // Visualizzare il form per aggiungere una camera ad un hotel
    }

    public function StoreRoom(Request $request)
    {
        Room::insert([
            'room_number' => $request->room_number,
            'room_type' => $request->room_type,
            'price_per_night' => $request->price_per_night,
            'available' => $request->available ?? false,
            'hotel_id' => $request->hotel_id,
        ]);
        
        $notification = array(
            'message' => 'Room created successfully',
            'alert-type' => 'success',
        );
    
        return redirect()->route('all.room')->with($notification);
    }

    public function EditRoom($id)
    {
        $room = Room::findOrFail($id); // Trovare la camera specificata nel database
        return view('backend.room.edit_room', compact('room')); // Visualizzare il form per modificare la camera
    }

    public function UpdateRoom(Request $request)
    {

        Room::findOrFail($request->id)->update([
            'room_number' => $request->room_number,
            'room_type' => $request->room_type,
            'price_per_night' => $request->price_per_night,
            'available' => $request->available,
        ]);
    
        $notification = array(
            'message' => 'Room updated successfully',
            'alert-type' => 'success',
        );
    
        return redirect()->back()->with($notification);
    }

    public function DeleteRoom($id)
    {
        $room = Room::findOrFail($id); // Trovare la camera da eliminare nel database
        $room->delete(); // Eliminare la camera

        $notification= array(
            'message' => 'Hotel Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
    public function AllHotel()
    {
        $hotels = Hotel::all(); // Ottenere tutti gli hotel dal database
        return view('backend.hotel.all_hotel', compact('hotels')); // Passare gli hotel alla vista
    }

    public function AddHotel()
    {
        return view('backend.hotel.add_hotel'); // Visualizzare il form per aggiungere un nuovo hotel
    }

    public function StoreHotel(Request $request)
    {
        Hotel::insert([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'stars' => $request->stars,
            'description' => $request->description,
        ]);
    
        $notification = array(
            'message' => 'Hotel created successfully',
            'alert-type' => 'success',
        );
    
        return redirect()->route('all.hotel')->with($notification);
    }

    public function EditHotel($id)
    {
        $hotel = Hotel::findOrFail($id); // Trovare l'hotel specificato nel database
        $rooms = Room::where('hotel_id', $hotel->id)->get();
        return view('backend.hotel.edit_hotel', compact('hotel','rooms')); // Visualizzare il form per modificare l'hotel
    }

    public function UpdateHotel(Request $request)
    {
        $id = $request->id;

        Hotel::findOrFail($id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'stars' => $request->stars,
        ]);
    
        $notification = array(
            'message' => 'Hotel updated successfully',
            'alert-type' => 'success',
        );
    
        return redirect()->route('all.hotel')->with($notification);
    }

    public function DeleteHotel($id)
    {
        try {
            DB::beginTransaction();
    
            $hotel = Hotel::findOrFail($id);
    
            // Trova tutte le stanze associate all'hotel e eliminale
            Room::where('hotel_id', $hotel->id)->delete();
    
            // Elimina l'hotel
            $hotel->delete();
    
            DB::commit();
    
            $notification = array(
                'message' => 'Hotel and associated rooms deleted successfully',
                'alert-type' => 'success',
            );
    
            return redirect()->back()->with($notification);
        } catch (\Exception $e) {
            DB::rollBack();
    
            $notification = array(
                'message' => 'An error occurred while deleting hotel and associated rooms.',
                'alert-type' => 'error',
            );
    
            return redirect()->back()->with($notification);
        }
    }

    public function AllBooking()
    {
        $bookings = Booking::all(); // Ottenere tutte le prenotazioni dagli hotel dal database
        return view('backend.booking.all_booking', compact('bookings')); // Passare le prenotazioni alla vista
    }

    public function AddBooking()
    {
        $rooms = Room::whereNotIn('id', function($query) {
            $query->select('room_id')->from('booking');
        })->get();

        $users = User::all();

        return view('backend.booking.add_booking', compact('rooms','users'));
    }

    public function StoreBooking(Request $request)
    {
        Booking::insert([
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'guests_number' => $request->guests_number,
            'total_payment' => $request->total_payment,
            'confirmed' => $request->confirmed,
            'room_id' => $request->room_id,
            'user_id' => $request->user_id,
        ]);
        
        $notification = array(
            'message' => 'Booking created successfully',
            'alert-type' => 'success',
        );
    
        return redirect()->route('all.booking')->with($notification);
    }

    public function EditBooking($id)
    {
        $booking = Booking::findOrFail($id); // Trovare la prenotazione specificata nel database
        return view('backend.booking.edit_booking', compact('booking')); // Visualizzare il form per modificare la prenotazione
    }

    public function UpdateBooking(Request $request)
    {
        $booking = Booking::findOrFail($request->id); // Trova la prenotazione nel database

        Booking::findOrFail($request->id)->update([
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'guests_number' => $request->guests_number,
            'total_payment' => $request->total_payment,
            'confirmed' => $request->confirmed ?? false,
            'room_id' => $request->room_id,
            'user_id' => $request->user_id,
        ]);
    
        $notification = array(
            'message' => 'Booking updated successfully',
            'alert-type' => 'success',
        );
    
        return redirect()->back()->with($notification);
    }

    public function DeleteBooking($id)
    {
        $booking = Booking::findOrFail($id); // Trovare la prenotazione da eliminare nel database
        $booking->delete(); // Eliminare la prenotazione

       $notification= array(
            'message' => 'Booking Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function InfoBooking($id)
    {
        $booking = Booking::findOrFail($id); // Trovare la prenotazione specificata nel database
        $room = Room::findOrFail($booking->room_id);
        $user = User::findOrFail($booking->user_id);
        return view('backend.booking.info_booking', compact('booking','room','user')); // Visualizzare il form per modificare la prenotazione
    }

    public function InfoHotel($id)
    {
        $hotel = Hotel::findOrFail($id); // Trovare la prenotazione specificata nel database
        $rooms = Room::where('hotel_id', $hotel->id)->get();
        return view('backend.hotel.info_hotel', compact('hotel','rooms')); // Visualizzare il form per modificare la prenotazione
    }

    public function InfoRoom($id)
    {
    }
}
