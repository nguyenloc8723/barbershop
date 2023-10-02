<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Models\booking;
use Illuminate\Http\Request;

class BookingController extends AdminBaseController
{
    public $model = booking::class;
    public $pathViews = 'admin.booking';
    public $columns = [
        'id' => 'id',
        'user_id' => 'Id Người dùng',
        'stylist_id' => 'Id Stylist',
        'timesheet_id' => 'Id Timesheet',
        'date' => "Ngày cắt",
        'special_requirement' => "Yêu cầu đặc biệt",
        'is_consultant' => "Tư vấn",
        'is_accept_take_a_photo' => "Chụp ảnh sau khi cắt",
        'status' => 'Trạng thái',
    ];


}
