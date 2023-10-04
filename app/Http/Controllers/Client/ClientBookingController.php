<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientBookingController extends Controller
{
    public function index(){
        return view('client.booking.index');
    }

    public function chooseServices(){
        return view('client.booking.chooseServices');
    }
}
