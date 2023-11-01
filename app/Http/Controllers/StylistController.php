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
        $stylist->excerpt=$request->excerpt;
        if ($request->hasFile('image')) {
            $image = $request->image->getClientOriginalName();
            $request->image->storeAs('public/image/', $image);
            $stylist->image = $image;
        }
        $request->validate([
            'name' => 'required', // Kiểm tra xem trường 'field1' có được điền không
            'excerpt' => 'required',    // Kiểm tra xem trường 'field2' có đúng định dạng email không
            'phone' => 'numeric',  // Kiểm tra xem trường 'field3' có phải là số không
            'image' => 'required',  // Kiểm tra xem trường 'field3' có phải là số không
        ],
        [
            'name.required' => 'Hãy nhập tên stylist.',
            'excerpt.required' => 'Mô tả ngắn không được để trống.',
            'phone.numeric' => 'Số điện thoại không được để trống và phải là số.',
            'image.required' => 'Ảnh đại diện không được để trống.',
        ]);
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
            $stylist->excerpt=$request->excerpt;
            if($request->image){
                Storage::delete('public/image/',$stylist->image);   
                $image=$request->image->getClientOriginalName();
                $request->image->storeAs('public/image/', $image);
                $stylist->image=$image;
            }
            $request->validate([
                'name' => 'required', 
                'excerpt' => 'required',   
                'phone' => 'numeric',  
                'image' => 'required', 
            ],
            [
                'name.required' => 'Hãy nhập tên stylist.',
                'excerpt.required' => 'Mô tả ngắn không được để trống.',
                'phone.numeric' => 'Số điện thoại không được để trống và phải là số.',
                'image.required' => 'Ảnh đại diện không được để trống.',
            ]);
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
    public function deleteMultiple(Request $request) {
        $selectedStylists = $request->input('selected_stylists', []);
    
        // Xóa các stylist có ID nằm trong mảng $selectedStylists
        Stylist::whereIn('id', $selectedStylists)->delete();
    
        return redirect()->route('stylists.index');
    }
}
