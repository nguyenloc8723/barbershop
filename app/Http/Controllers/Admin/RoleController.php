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
        $data = Role::all();
        return view(self::PATH . __FUNCTION__, compact('data'));
    }
}
