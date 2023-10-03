<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminBaseController;
use App\Models\Results;

use Illuminate\Http\Request;

class resultsController extends AdminBaseController
{
    //
    public $model = Results::class;
    public $pathViews = 'admin.results';
    public $columns = [
        'id' => 'Id',
        'booking_id' => 'Booking_id',
        'image' => 'image',
    ];

    public function result(Request $request) {
        
        $data = $this->model->paginate();

        return view($this->pathViews.'.'.'index', compact('data'))->with('columns', $this->columns);

    
    }
}
