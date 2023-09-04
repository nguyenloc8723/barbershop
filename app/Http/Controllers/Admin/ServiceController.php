<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        return view('admin.service.index');
    }

    public function serviceCombo(){
        return view('admin.service.service_combo');
    }
}
