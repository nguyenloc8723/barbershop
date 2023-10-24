<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    const PATH = 'admin.roles.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $data = Role::pluck('name','name')->all();
        $data = Role::all();
//        return response()->json($data);
//        dd($data);
        return view(self::PATH . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = new Role();

        $model->fill($request->all());

        $model->save();

        $model->syncPermissions($request->permissions);

        return redirect()->route('role');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view(self::PATH . __FUNCTION__);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Role::query()->findOrFail($id);
        $permissions = $model->permissions->pluck('name')->toArray();

        return view(self::PATH . __FUNCTION__, compact('model', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = Role::query()->findOrFail($id);

        $model->fill($request->all());

        $model->save();

        $model->syncPermissions($request->permissions);

        return redirect()->route('role');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::query()->findOrFail($id);
        $role->delete();

        return redirect()->route('role');
    }
}
