<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Models\Booking;
use App\Models\Stylist;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends AdminBaseController
{
    public $model = Booking::class;
    public $pathViews = 'admin.booking_blade';
    public $columns = [
        'id' => 'id',
        'user_id' => 'Id Người dùng',
        'stylist_id' => 'Id Stylist',
        'timesheet_id' => 'Id Timesheet',
        'date' => "Ngày cắt",
        'special_requirement' => "Yêu cầu đặc biệt",
        'is_consultant' => "Tư vấn",
        'is_accept_take_a_photo' => "Chụp ảnh sau khi cắt",
        'status' => 'Trạng thái',
    ];

    public function getDetail(string $id){
//        $stylist = Stylist::find(1)->orderBy('name')->get();
        $data = Booking::findOrFail($id)
            ->with('user')
            ->with('stylist')
            ->with('timesheet')
            ->get();

//        dd($data);
        return view($this->pathViews. '/' . 'detail',compact('data'))
            ->with('columns', $this->columns);
    }

    public function index(){
        $data = Booking::query()->with('user')->with('stylist')->get();
        return view($this->pathViews. '/' . __FUNCTION__,compact('data'))
            ->with('columns', $this->columns);
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
