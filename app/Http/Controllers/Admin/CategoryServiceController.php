<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\service_categories;
use Illuminate\Http\Request;

class CategoryServiceController extends AdminBaseController
{
    public $model = service_categories::class;
    public $pathViews = 'admin.categoryService';
    public $columns = [
        'id' => 'id',
        'name' => 'Tên danh mục',
        'is_active' => 'Trạng thái hoạt động',
    ];

}
