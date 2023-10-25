<?php

namespace App\Http\Controllers;

use App\Models\Stylist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stylists= Stylist::get();
        return view('/stylist/index_stylist',compact('stylists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/stylist/add_stylist');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $stylist=new Stylist();
        $stylist->name=$request->name;  
        $stylist->phone=$request->phone;
        $image=$request->image->getClientOriginalName();
        $request->image->storeAs('public/image/', $image);
        $stylist->image=$image;
        $stylist->save();
        return redirect()->route('stylists.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stylist $stylist)
    {
        return view('/stylist/edit_stylist',compact('stylist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stylist $stylist)
    {
            $stylist->name=$request->name;
            $stylist->phone=$request->phone;
            if($request->image){
                Storage::delete('public/image/',$stylist->image);
                $image=$request->image->getClientOriginalName();
                $request->image->storeAs('public/image/', $image);
                $stylist->image=$image;
            }
           $stylist->save();
           return redirect()->route('stylists.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stylist $stylist)
    {
        $stylist->delete();
        return redirect()->route('stylists.index');
    }
    public function getSearch(Request $request)
    {
     $stylists= Stylist::where('name','like','%'.$request->key.'%')->get();
     return view('/stylist/search_stylist',compact('stylists'));
    }
}
