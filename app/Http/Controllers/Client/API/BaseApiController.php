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
//        Log::info($request->all());
        $booking = $request->all();

        $model = new $this->booking;
        $model->fill($booking);
        $model->save();

//        $booking = Booking::create([
//            'user_id' => $user,
//            'stylist_id' => $request->stylist,
//            'timesheet_id' => $request->time,
//            'date' => $request->date,
//            'special_requirement' => $request->specialRequirement,
//            'is_consultant' => $request->is_consultant,
//            'is_accept_take_a_photo' => $request->isAcceptTakeAPhoto,
//            'status' => $request->status,
//        ]);
        $bookingDone_id = $model->id;
        $service = $request->arrayIDService;


        foreach ($service as $value) {
            $booking_service = new Booking_service;
            $booking_service->fill([
                'booking_id' => $bookingDone_id,
                'service_id' => $value,
            ]);
            $booking_service->save();
        }
        return response()->json(['success'=>$bookingDone_id]);
    }

    public function stylistDetail(string $id){
        $data = $this->model::query()->where('id',$id)->first();
        return response()->json($data);
    }

    public function bookingDone($id){
        $data = $this->booking::query()->where('id',$id)->with('service','timeSheet')->first();
        return response()->json($data);
    }

    public function bookingDestroy($id){
        $this->booking::where('id', $id)->update(['status' => 2]);
        $this->booking::where('id',$id)->delete();

        Booking_service::where('booking_id',$id)->delete();
        return response()->json(['success'=>'Xóa thành công']);
    }
}
