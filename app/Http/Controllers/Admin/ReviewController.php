<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewController extends AdminBaseController
{
    public $model = Reviews::class;
    public $route = 'review';
    public $pathViews = 'admin.review';
    public $columns = [
        'id' => 'id',
        'booking_id' => 'Booking_id',
        'rating' => 'Rating',
        'comment' => 'comment'
    ];
}
