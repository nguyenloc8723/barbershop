<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Stylist;
use Illuminate\Http\Request;

class ClientTeamController extends Controller
{
    public function index(){
        $stylists= Stylist::all();
        return view('client.display.team',compact('stylists'));
    }
}
