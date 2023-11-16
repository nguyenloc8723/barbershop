<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Models\Booking;
use App\Models\Results;
use App\Models\Stylist;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends AdminBaseController
{
    public $model = Booking::class;
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

//        $stylist = Stylist::find(1)->orderBy('name')->get();
        $data = Booking::query()->where('id', $id)
            ->with('timesheet')
            ->with('service')
            ->with('results')
            ->with('reviews')
            ->first();
        $stylist = User::where('id', $data->stylist_id)->first();
//        dd($data);
//        dd($stylist);
        return view($this->pathViews . '/' . 'detail', compact('data', 'stylist'))
            ->with('columns', $this->columns);
    }


    public function index()
    {
        $data = Booking::query()
            ->with('user')
            ->with('timesheet')

            ->orderBy('id','desc')->get();
        dd($data);
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
        }
        $booking = Booking::findorFail($id);
        if ($booking) {
            $booking->status = '3';
            $booking->save();
        }
        return $this->getDetail($id);
    }



//    public function getDetail(){
//        $data = Booking::find()->with('stylist')->get();
//
//        return view($this->pathViews. '.' . 'detail',compact('data'))
//            ->with('columns', $this->columns);
//    }
//    public $model = [
//        [
//            'id' => '1',
//            'user_id' => 'Id Người dùng',
//            'stylist_id' => 'Id Stylist',
//            'timesheet_id' => 'Id Timesheet',
//            'date' => "Ngày cắt",
//            'special_requirement' => "Yêu cầu đặc biệt",
//            'is_consultant' => "Tư vấn",
//            'is_accept_take_a_photo' => "Chụp ảnh sau khi cắt",
//            'status' => 'Trạng thái',
//        ],
//        [
//            'id' => '2',
//            'user_id' => 'Id Người dùng',
//            'stylist_id' => 'Id Stylist',
//            'timesheet_id' => 'Id Timesheet',
//            'date' => "Ngày cắt",
//            'special_requirement' => "Yêu cầu đặc biệt",
//            'is_consultant' => "Tư vấn",
//            'is_accept_take_a_photo' => "Chụp ảnh sau khi cắt",
//            'status' => 'Trạng thái',
//        ]
//    ];
}
