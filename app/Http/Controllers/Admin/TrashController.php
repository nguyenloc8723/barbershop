<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    function category(){
        $columns = [
            'id' => 'id',
            'name' => 'Tên danh mục',
            'is_active' => 'Trạng thái hoạt động',
        ];
        return view('admin.trash.category')
            ->with('columns', $columns);
    }
}
