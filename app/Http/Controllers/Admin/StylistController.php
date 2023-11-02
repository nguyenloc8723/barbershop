<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\Stylist;
use Illuminate\Http\Request;

class StylistController extends AdminBaseController
{
    public $model = Stylist::class;
    public $pathViews = 'admin.stylist';
    public $route = 'stylist';
}
