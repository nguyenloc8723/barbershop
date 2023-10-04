<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\StylistTimeSheet;
use Illuminate\Http\Request;

class StylistTimeSheetsController extends AdminBaseController
{
    public $model = StylistTimeSheet::class;
    public $route = 'stylistTimeSheets';
    public $pathViews = 'admin.stylistTimeSheets';
    public $columns = [
        'id' => 'ID',
        'stylist_id' => 'ID Stylist',
        'timeshhet_id' => 'ID Time Sheet',
        'is_active' => 'Active',
        'is_block' => 'Block',
    ];



}
