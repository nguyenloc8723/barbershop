<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs= Blog::get();
        // $blogs=strip_tags($blogs);
        return view('index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog=new Blog();
        $blog->title=$request->title;  
        $image=$request->image->getClientOriginalName();
        $request->image->storeAs('public/image/', $image);
        $blog->image=$image;
        $blog->description=$request->description; 
        $blog->save();
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
            $blog->title=$request->title;
            if($request->image){
                Storage::delete('public/image/',$blog->image);
                $image=$request->image->getClientOriginalName();
                $request->image->storeAs('public/image/', $image);
                $blog->image=$image;
                $blog->description=$request->description;
            }
           $blog->save();
           return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index');
    }
}
