<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;

class ServiceController extends AdminBaseController
{
    public $model = service::class;
    public $pathViews = 'admin.service';
    public $columns = [
        'id' => 'id',
        'name' => 'Tên dịch vụ',
        'price' => 'Giá dịch vụ',
        'description' => 'Mô tả',
        'is_active' => 'Trạng thái hoạt động',
        'money' => 'giá tính theo vnd',
    ];
}
