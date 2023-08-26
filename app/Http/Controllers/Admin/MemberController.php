<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index(){

        return view('admin.layout.master');
    }
}
