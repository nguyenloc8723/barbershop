<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\Stylist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiStylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Stylist::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('public/images');
            $filename = basename($path);
            Stylist::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'excerpt' => $request->input('excerpt'),
                'image' => $filename,
            ]);
        }

        return response()->json(['success','Thêm mới thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Stylist::query()->findOrFail($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stylist = Stylist::query()->findOrFail($id);
        try {
            if ($request->hasFile('image')) {
                // Xóa ảnh cũ
                Storage::delete('public/images/'.$stylist->image);
                $file = $request->file('image');
                $path = $file->store('public/images');
                $filename = basename($path);

                $stylist->update([
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'excerpt' => $request->input('excerpt'),
                    'image' => $filename,
                ]);
                $stylist->touch();
                dd($stylist->getChanges());
            } else {
                $stylist->update([
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'excerpt' => $request->input('excerpt'),
                ]);
                $stylist->touch();
                dd($stylist->getChanges());
            }

            return response()->json(['success' => 'Cập nhật thành công']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Stylist::find($id);
        $data->delete();
        return response()->json(['success','Đã vào thùng rác']);
    }
}
