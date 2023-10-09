<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhoneAuthController extends Controller
{
    public function login(){
        return view('client.display.login');
    }
    public function otp(){
        return view('client.display.otp');
    }
    public function welcome(){
        return view('welcome');
    }
}
