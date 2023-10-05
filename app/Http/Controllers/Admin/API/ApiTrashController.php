<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\Service_categories;
use App\Models\StylistTimeSheet;
use App\Models\User;
use Illuminate\Http\Request;

class ApiTrashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function category()
    {
        $data = Service_categories::onlyTrashed()->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function restore(Request $request, $id)
    {
        Service_categories::withTrashed()->where('id',$id)
            ->restore();
        return response()->json(['success','khôi phục thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Service_categories::withTrashed()->where('id',$id)
            ->forceDelete();
        return response()->json(['success','khôi phục thành công']);
    }
    public function stylistTimeSheets()
    {
        $data = StylistTimeSheet::onlyTrashed()->get();
        return response()->json($data);
    }
    public function destroySTSs(string $id)
    {
        StylistTimeSheet::withTrashed()->where('id',$id)->forceDelete();
        return response()->json(['success','Delete successfully!']);
    }

    public function restoreSTSs(Request $request, $id){
        StylistTimeSheet::withTrashed()->where('id',$id)->restore();
        return response()->json(['success','Restore successfully!']);
    }

    public function user()
    {
        $data = User::onlyTrashed()->get();
        return response()->json($data);
    }

    public function destroyUser(string $id)
    {
        User::withTrashed()->where('id',$id)->forceDelete();
        return response()->json(['success','Delete successfully!']);
    }

    public function restoreUser(Request $request, $id){
        User::withTrashed()->where('id',$id)->restore();
        return response()->json(['success','Restore successfully!']);
    }

}
