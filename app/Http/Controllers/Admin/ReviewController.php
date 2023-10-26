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
        'comment' => 'Comment',
        'reply' => 'Reply'
    ];

    

    public function reply(Request $request, $id){
        
        $data = Reviews::where('id', $id)->first();
        if($request->isMethod('POST')){
            $data->update($request->all());
            return redirect()->route('review.index');
        }
       

        return view('admin.review.edit', compact('data'));
    }
}
