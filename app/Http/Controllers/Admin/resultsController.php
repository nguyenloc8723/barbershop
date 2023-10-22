<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminBaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Results;
use App\Models\Booking;

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

    public function result(Request $request)
    {

        $data = $this->model->paginate();


        $booking = Booking::all();

        $results = [];

        foreach ($booking as $bookingData) {
            // dd($bookingData['status']);
            if ($bookingData['status'] == '1') {
                $checkResult = Results::where('booking_id', $bookingData['id'])->first();
                if (!$checkResult) {
                    $results[] = [
                        'booking_id' => $bookingData['id'],
                        'image' => 'image'
                    ];
                }
            }
        }
        foreach ($results as $resultData) {
            DB::table('results')->insert($resultData);
        }

        return view($this->pathViews . '.' . 'index', compact('data'))->with('columns', $this->columns);
    }
}
