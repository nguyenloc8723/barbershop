<?php

namespace App\Http\Controllers\Client\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Booking_service;
use App\Models\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BaseApiController extends Controller
{
    public $model;
    public $modelChooService;
    public $imgService;
    public $booking;
    public function index()
    {
        $data = $this->model::all();
        return response()->json($data);
    }

    // hàm loadService dùng khi chọn dịch vụ cắt
    public function loadService()
    {
        $data = $this->modelChooService::query()->with('service')->get();
        $service = $this->imgService::query()->with('images')->get();
        return response()->json(['data' => $data, 'service' => $service]);
    }

    public function pullRequest(Request $request)
    {
        $user = 1;
        Log::info($request->is_accept_take_a_photo);
        $booking = Booking::create([
            'user_id' => $user,
            'stylist_id' => $request->stylist,
            'timesheet_id' => $request->time,
            'date' => $request->date,
            'special_requirement' => $request->specialRequirement,
            'is_consultant' => $request->is_consultant,
            'is_accept_take_a_photo' => $request->isAcceptTakeAPhoto,
            'status' => 1,
        ]);
        $id = $booking->id;
        $service = $request->arrayIDService;
        foreach ($service as $value) {
            Booking_service::create([
                'booking_id' => $id,
                'service_id' => $value,
            ]);
        }
        return response()->json(['success']);
    }

    public function stylistDetail(string $id){
        $data = $this->model::query()->where('id',$id)->first();
        return response()->json($data);
    }


}
