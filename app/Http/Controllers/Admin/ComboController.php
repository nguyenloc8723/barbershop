<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComboController extends Controller
{
    public function __invoke(){
        return view('admin.layout.master',['data_table' => 'data_table']);
    }
}
