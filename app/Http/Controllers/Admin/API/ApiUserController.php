<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new User;
        $data->fill($request->except('_token'));
        $data->save();
        return response()->json(['success','Thêm mới thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::query()->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $model = User::query()->findOrFail($id);

        $model->update($data);
        return response()->json(['success','Cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
        $data->delete();
        return response()->json(['success','Đã vào thùng rác']);
    }
}
