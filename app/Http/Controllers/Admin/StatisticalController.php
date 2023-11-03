<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Results;
use Illuminate\Http\Request;

class StatisticalController extends AdminBaseController
{
    public $route = 'statistical';
    public $pathViews = 'admin.statistical.index';
    public function statistical( Request $request )
    {
        // $bookedBooking = Results::distinct('booking_id')->count();
        $bookedBooking = Booking::where('status',0)->count();
        $notBookedBooking = Booking::where('status',1)->count();
        $cancelledBooking = Booking::where('status',2)->count();
        $totalBooking = $bookedBooking + $notBookedBooking + $cancelledBooking;
        $totalPrice = Booking::where('status',0)->sum('price');


        $today = now()->format('Y-m-d');
        // $todayCompletedCounts = Results::distinct('booking_id')->whereDate('created_at', $today)->count();
        $todayCompletedCounts = Booking::where('status','0')->whereDate('created_at', $today)->count();
        $todayPendingCounts = Booking::where('status','1')->whereDate('created_at', $today)->count();
        $todayCanceledCounts = Booking::where('status','2')->whereDate('created_at', $today)->count();
        $todayTotalPrice = Booking::where('status',0)->whereDate('created_at', $today)->sum('price');


        $yesterday = Carbon::yesterday()->format('Y-m-d');
        // $yesterdayCompletedCounts = Results::distinct('booking_id')->whereDate('created_at', $yesterday)->count();
        $yesterdayCompletedCounts = Booking::where('status','0')->whereDate('created_at', $yesterday)->count();
        $yesterdayPendingCounts = Booking::where('status','1')->whereDate('created_at', $yesterday)->count();
        $yesterdayCanceledCounts = Booking::where('status','2')->whereDate('created_at', $yesterday)->count();
        $yesterdayTotalPrice = Booking::where('status',0)->whereDate('created_at', $yesterday)->sum('price');



        $startOfMonth = now()->startOfMonth()->format('Y-m-d');
        $endOfMonth = now()->endOfMonth()->format('Y-m-d');
        $thisMonthTotalPrice = Booking::where('status',0)->whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('price');


        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d');
        $lastMonthTotalPrice = Booking::where('status',0)->whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->sum('price');



        // $startOfLastWeek = Carbon::now()->subWeek()->startOfWeek()->format('Y-m-d');
        // $endOfLastWeek = Carbon::now()->subWeek()->endOfWeek()->format('Y-m-d');
        // $lastWeekCounts = Booking::where('status','1')->whereBetween('date', [$startOfLastWeek, $endOfLastWeek])->count();
        // $startOfWeek = now()->startOfWeek()->format('Y-m-d');
        // $endOfWeek = now()->endOfWeek()->format('Y-m-d');
        // $thisWeekCompletedCounts = Results::distinct('booking_id')->whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        // $thisWeekPendingCounts = Booking::where('status','1')->whereBetween('date', [$startOfWeek, $endOfWeek])->count();
        // $thisWeekCanceledCounts = Booking::where('status','2')->whereBetween('date', [$startOfWeek, $endOfWeek])->count();



        $startDate = $request->input('startDate'); // Ngày bắt đầu (ví dụ: '2023-10-01')
        $endDate = $request->input('endDate'); // Ngày kết thúc (ví dụ: '2023-10-31')

        $chartBooking = Booking::select(
            DB::raw('DATE(created_at) as order_date'),
            DB::raw('COUNT(CASE WHEN status = 0 THEN 1 END) as completed_total'),
            DB::raw('COUNT(CASE WHEN status = 1 THEN 1 END) as pending_total'),
            DB::raw('COUNT(CASE WHEN status = 2 THEN 1 END) as canceled_total')
        )
        ->groupBy('order_date')
        ->orderBy('order_date', 'asc')
        ->get();

        $startOfWeek = now()->startOfWeek()->format('Y-m-d');
        $endOfWeek = now()->endOfWeek()->format('Y-m-d');

        $chart7DaysBooking = Booking::select(
            DB::raw('DATE(created_at) as order_date'),
            DB::raw('COUNT(CASE WHEN status = 0 THEN 1 END) as completed_total'),
            DB::raw('COUNT(CASE WHEN status = 1 THEN 1 END) as pending_total'),
            DB::raw('COUNT(CASE WHEN status = 2 THEN 1 END) as canceled_total')
        )
        ->whereBetween(DB::raw('DATE(created_at)'), [$startOfWeek, $endOfWeek])
        ->groupBy('order_date')
        ->orderBy('order_date', 'asc')
        ->get();

        $orderSummary = Booking::select(
            DB::raw('DATE(created_at) as order_date'),
            DB::raw('COUNT(CASE WHEN status = 0 THEN 1 END) as completed_total'),
            DB::raw('COUNT(CASE WHEN status = 1 THEN 1 END) as pending_total'),
            DB::raw('COUNT(CASE WHEN status = 2 THEN 1 END) as canceled_total'),
            DB::raw('COUNT(id) as booked_total'),
            DB::raw('SUM(CASE WHEN status = 0 THEN price ELSE 0 END) as daily_revenue')
        )
        ->groupBy('order_date')
        ->orderBy('order_date', 'desc')
        ->limit(5)
        ->get();

        return view($this->pathViews,
                    compact('totalBooking', 'bookedBooking', 'notBookedBooking', 'cancelledBooking',
                            'totalPrice','orderSummary','chartBooking','chart7DaysBooking',
                            'startOfMonth','endOfMonth','thisMonthTotalPrice',
                            'startOfLastMonth','endOfLastMonth','lastMonthTotalPrice',
                            'today','todayCompletedCounts','todayPendingCounts','todayCanceledCounts','todayTotalPrice',
                            'yesterday','yesterdayCompletedCounts','yesterdayPendingCounts','yesterdayCanceledCounts','yesterdayTotalPrice',));
    }

    // public function filler_by_date(){

    //     $from_date = $request->input('startDate');
    //     $to_date = $request->input('endDate');

    //     // dd(1232434);

    //     $chartBooking = Booking::select(
    //         DB::raw('DATE(created_at) as order_date'),
    //         DB::raw('COUNT(CASE WHEN status = 0 THEN 1 END) as completed_total'),
    //         DB::raw('COUNT(CASE WHEN status = 1 THEN 1 END) as pending_total'),
    //         DB::raw('COUNT(CASE WHEN status = 2 THEN 1 END) as canceled_total')
    //     )
    //     ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
    //     ->groupBy('order_date')
    //     ->orderBy('order_date', 'desc')
    //     ->get();

    //     return response()->json(['chartBooking'=>$chartBooking]);
    // }

}