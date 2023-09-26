<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends AdminBaseController
{
    public $model = User::class;
    public $pathViews = 'admin.user';

//    public function __construct()
//    {
//        dd(1313);
//    }
}
