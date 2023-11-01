<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Portfolio;
use App\Models\Pricing;
use App\Models\Service;
use App\Models\Stylist;
use Illuminate\Http\Request;

class ClientIndexController extends Controller
{

    public function index()
    {
        $blogs = Blog::limit(5)->get();
        $stylists = Stylist::limit(3)->get();
        $data = Service::limit(8)->get();
        $model=Service::all();
        return view('client.display.index',compact('blogs','stylists','data','model'));
//                return view('client.display.index',compact('stylists'));
//        return view('client.display.index',[
//            'blogs' => $blogs,
//            'stylists' => $stylists,
//            'data' => $data,
//        ]);
    }
    public function about()
    {
        $data = Service::limit(8)->get();
        $stylists= Stylist::limit(3)->get();
        return view('client.display.about',compact('data','stylists'));
    }
    public function portfolio()
    {
        $portfolio = Portfolio::limit(9)->get();
        return view('client.display.portfolio',compact('portfolio'));
    }
    public function faq()
    {
        $faq= Faq::all();
        return view('client.display.faq',compact('faq'));
    }
    public function pricing()
    {
        $pricing = Pricing::limit(9)->get();
        return view('client.display.pricing',compact('pricing'));
    }
}
