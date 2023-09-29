<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\stylelist;

class MemberController extends AdminBaseController
{
    public $model = stylelist::class;
    public $pathViews = 'admin.member';

}
