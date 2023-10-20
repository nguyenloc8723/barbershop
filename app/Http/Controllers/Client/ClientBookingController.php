<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientBookingController extends Controller
{
    public function index(){
        return view('client.booking.index');
    }

    public function bookingDone($booking_id){
        return view('client.booking.bookingDone',compact('booking_id'));
    }
}
