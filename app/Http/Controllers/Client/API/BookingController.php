<?php

namespace App\Http\Controllers\Client\API;

use App\Http\Controllers\Controller;
use App\Models\Stylist;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookingController extends BaseApiController
{
    public $model = Stylist::class;

    public function timeSheetDetail(string $id)
    {
        $dataStylist = $this->model::query()->with('timeSheet')->where('id',$id)->first();
        $dataTimeSheet = Timesheet::all();
        Log::info($dataStylist);
        return response()->json(['dataStylist'=>$dataStylist, 'dataTimeSheet'=>$dataTimeSheet]);
    }
}
