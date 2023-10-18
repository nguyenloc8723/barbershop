<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\StylistTimeSheet;
use Illuminate\Http\Request;

class ApiStylistTimeSheetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StylistTimeSheet::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new StylistTimeSheet;
        $data->fill($request->except('_token'));
        $data->save();
        return response()->json(['success','Created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = StylistTimeSheet::query()->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $model = StylistTimeSheet::query()->findOrFail($id);

        $model->update($data);
        return response()->json(['success','Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = StylistTimeSheet::find($id);
        $data->delete();
        return response()->json(['success','Moved successfully']);
    }
}
