<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Stylist;
use App\Models\User;
use Illuminate\Http\Request;

class ClientIndexController extends Controller
{

    public function index()
    {
        $blogs = Blog::limit(5)->get();
        $stylists = User::query()->where('user_type', 'STYLIST')->limit(3)->get();
        $data = Service::limit(8)->get();
        return view('client.display.index',compact('blogs','stylists','data'));
//                return view('client.display.index',compact('stylists'));
//        return view('client.display.index',[
//            'blogs' => $blogs,
//            'stylists' => $stylists,
//            'data' => $data,
//        ]);
    }
}
