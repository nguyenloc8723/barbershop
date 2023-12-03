<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Models\Booking;
use App\Models\Booking_service;
use App\Models\Results;
use App\Models\Service;
use App\Models\Service_categories;
use App\Models\Stylist;
use App\Models\User;
use App\Models\Timesheet;
use Illuminate\Http\Request;

class BookingController extends AdminBaseController
{
    public $model = Booking::class;
    public $modelChooService = Service_categories::class;
    public $imgService = Service::class;
    public $pathViews = 'admin.booking_blade';
    public $columns = [
        'id' => 'id',
        'user_phone' => 'Id Người dùng',
        'stylist_id' => 'Id Stylist',
        'timesheet_id' => 'Id Timesheet',
        'date' => "Ngày cắt",
        'special_requirement' => "Yêu cầu đặc biệt",
        'is_consultant' => "Tư vấn",
        'is_accept_take_a_photo' => "Chụp ảnh sau khi cắt",
        'status' => 'Trạng thái',
    ];

    public function getDetail(string $id)
    {
        $data = Booking::query()->where('id', $id)
            ->with('timesheet')
            ->with('service')
            ->with('results')
            ->first();
        $stylist = User::where('id', $data->stylist_id)->first();
        $stylists = User::where('user_type', 'STYLIST')->get();
        $timeSheets = Timesheet::all();
        //dd($timeSheets);
        return view($this->pathViews . '/' . 'detail', compact('data', 'stylist','stylists','timeSheets'))
            ->with('columns', $this->columns);
    }

    public function getDetailAPI(string $id)
    {
//        dd($id);
        $data = Booking::query()->where('id', $id)
            ->with('timesheet')
            ->with('service')
            ->with('results')
            ->with('stylist')
            ->first();
//        $stylist = User::where('id', $data->stylist_id)->first();
//        dd($data);
        return response()->json($data);
    }


    public function index()
    {
        $data = Booking::query()
            ->with('user')
            ->with('timesheet')

            ->orderBy('id','desc')->get();
        return view($this->pathViews . '/' . __FUNCTION__, compact('data'))
            ->with('columns', $this->columns);

    }

    public function fileUpload(Request $request, string $id)
    {
        if ($request->hasFile("imageFile")) {
            $files = $request->file("imageFile");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $result = $file->storeAs('images', $imageName, 'public');
                Results::create([
                    'booking_id' => $id,
                    'image' => $result,
                ]);
            }
            $booking = Booking::findorFail($id);
            if ($booking) {
                $booking->status = '3';
                $booking->save();
            }
        }

        return $this->getDetail($id);
    }

    public function hoanThanhCat(string $id){
        $booking = Booking::findorFail($id);
        if ($booking) {
            $booking->status = '3';
            $booking->save();
        }
        return $this->getDetail($id);
    }
    public function update(Request $request, $id)
    {
        // Xử lý cập nhật dữ liệu ở đây, với $id là id của dữ liệu cần cập nhật
//        dd($id);
        // Ví dụ:
        $data = Booking::find($id);
        $data->stylist_id = $request->input('stylist_id');
        $data->date = $request->input('date');
        $data->timesheet_id = $request->input('timeSheet_id');
        $data->is_consultant = $request->input('is_consultant');
        $data->is_accept_take_a_photo = $request->input('is_accept_take_a_photo');
//        dd($data);
        $this->fileUpload($request,$id);
        $data->save();

        return response()->json(['success' => true, 'message' => 'Cập nhật thành công']);
    }

    public function loadService()
    {
        $data = $this->modelChooService::query()->with('service')->get();
        $service = $this->imgService::query()->with('images')->get();
        return response()->json(['data' => $data, 'service' => $service]);
    }

    public function xoaDichVuBooking($bookingId, $serviceId)
    {
        $bookingService = Booking_service::where('booking_id', $bookingId)
            ->where('service_id', $serviceId)
            ->first();

        if (!$bookingService) {
            return response()->json(['message' => 'Dịch vụ không tồn tại trong lịch đặt.'], 404);
        }

        $bookingService->delete();

        return response()->json(['message' => 'Đã xóa dịch vụ khỏi lịch đặt thành công.']);
    }
}
