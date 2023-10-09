<?php

namespace App\Http\Controllers\Client\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Service_categories;
use App\Models\Stylist;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookingController extends BaseApiController
{
    // đang kế thừa class base
    public $model = Stylist::class;
    public $modelChooService = Service_categories::class;
    public $imgService = Service::class;
    public $booking = Booking::class;

    public function timeSheetDetail(string $id)
    {
        $dataStylist = $this->model::query()->with('timeSheet')->where('id',$id)->first();
        $dataTimeSheet = Timesheet::all();
        return response()->json(['dataStylist'=>$dataStylist, 'dataTimeSheet'=>$dataTimeSheet]);
    }

    public function bookingDone(){
        $user = 1;
        $data = $this->booking::query()->where('user_id',$user)->with('service')->first();
        return response()->json($data);
    }
}
