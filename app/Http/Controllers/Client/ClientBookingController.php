<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Booking_service;
use App\Models\Reviews;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientBookingController extends Controller
{
    public function index()
    {
        return view('client.booking.index');
    }

    public function bookingDone($booking_id)
    {
        $bookings = Booking::with('stylist', 'User', 'timeSheet', 'reviews')
            ->where('id', $booking_id)
            // ->orderBy('create_at', 'desc')
            ->first();
        // dd($bookings);
        $combo = Booking_service::with('service')
            ->where('booking_id', $booking_id)
            ->get();
        // dd($combo);
        return view('client.booking.bookingDone', compact('booking_id', 'bookings', 'combo'));
    }
}
