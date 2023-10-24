<?php

namespace App\Http\Controllers\Client\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Booking_service;
use App\Models\Service;
use App\Models\Service_categories;
use App\Models\Stylist;
use App\Models\Timesheet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    // đang kế thừa class base
    public $model = Stylist::class;
    public $modelChooService = Service_categories::class;
    public $imgService = Service::class;
    public $booking = Booking::class;


    public function index()
    {
        $data = $this->model::all();
        return response()->json($data);
    }
    public function timeSheetDetail(string $id)
    {
        $dataStylist = $this->model::query()->with('timeSheet')->where('id',$id)->first();
        $dataTimeSheet = Timesheet::all();
//        Log::info($dataTimeSheet);
        return response()->json(['dataStylist'=>$dataStylist, 'dataTimeSheet'=>$dataTimeSheet]);
    }

    public function randomStylist(){
        $stylist = Stylist::inRandomOrder()->first();
        return response()->json($stylist);
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

        $booking = $request->all();
        $model = new $this->booking;
        $model->fill($booking);
        $model->save();
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

    public function bookingNotification($userId){
        $bookings = Booking::with(['timeSheet','stylist'])->where('user_id', $userId)
                    ->where('status', 1)
                    ->whereDoesntHave('results')
                    ->get();
        return response()->json($bookings);
    }

}
