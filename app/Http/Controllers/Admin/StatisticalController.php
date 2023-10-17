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
    public function index()
    {
        $bookedBooking = Results::distinct('booking_id')->count();
        $notBookedBooking = Booking::where('status', '1')->count();
        $cancelledBooking = Booking::where('status', '2')->count();
        $totalBooking = $bookedBooking + $notBookedBooking + $cancelledBooking;
        $totalPrice = Booking::sum('price');

        $today = now()->format('Y-m-d');
        $todayCompletedCounts = Results::distinct('booking_id')->whereDate('created_at', $today)->count();
        $todayPendingCounts = Booking::where('status','1')->whereDate('date', $today)->count();
        $todayCanceledCounts = Booking::where('status','2')->whereDate('date', $today)->count();

        $startOfWeek = now()->startOfWeek()->format('Y-m-d');
        $endOfWeek = now()->endOfWeek()->format('Y-m-d');
        $thisWeekCompletedCounts = Results::distinct('booking_id')->whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        $thisWeekPendingCounts = Booking::where('status','1')->whereBetween('date', [$startOfWeek, $endOfWeek])->count();
        $thisWeekCanceledCounts = Booking::where('status','2')->whereBetween('date', [$startOfWeek, $endOfWeek])->count();

        $startOfMonth = now()->startOfMonth()->format('Y-m-d');
        $endOfMonth = now()->endOfMonth()->format('Y-m-d');
        $thisMonthCounts = Results::distinct('booking_id')->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        $orderSummary = Booking::select(
            DB::raw('DATE(date) as order_date'),
            DB::raw('COUNT(status = 0) as completed_total'),
            DB::raw('COUNT(status = 1) as pending_total'),
            DB::raw('COUNT(status = 2) as canceled_total'),
            DB::raw('SUM(price) as daily_revenue')
        )->groupBy('order_date')->orderBy('order_date', 'desc')->get();

        return view($this->pathViews, compact('totalBooking', 'bookedBooking', 'notBookedBooking', 'cancelledBooking',
                                              'totalPrice','orderSummary',
                                              'todayCompletedCounts','todayPendingCounts','todayCanceledCounts'));
    }

    // public function present(){

    //     $today = now()->format('Y-m-d');
    //     $todayCounts = Booking::where('status','1')->whereDate('date', $today)->count();

    //     $startOfWeek = now()->startOfWeek()->format('Y-m-d');
    //     $endOfWeek = now()->endOfWeek()->format('Y-m-d');
    //     $thisWeekCounts = Booking::whereBetween('date', [$startOfWeek, $endOfWeek])->count();

    //     $startOfMonth = now()->startOfMonth()->format('Y-m-d');
    //     $endOfMonth = now()->endOfMonth()->format('Y-m-d');
    //     $thisMonthCounts = Booking::whereBetween('date', [$startOfMonth, $endOfMonth])->count();

    //     return view($this->pathViews. '.index', compact('totalBooking', 'bookedBooking', 'notBookedBooking', 'cancelledBooking','totalPrice'));

    // }

    public function past(){

        $yesterday = Carbon::yesterday()->format('Y-m-d');
        $yesterdayCounts = Booking::whereDate('date', $yesterday)->count();

        $startOfLastWeek = Carbon::now()->subWeek()->startOfWeek()->format('Y-m-d');
        $endOfLastWeek = Carbon::now()->subWeek()->endOfWeek()->format('Y-m-d');
        $lastWeekCounts = Booking::where('status','1')->whereBetween('date', [$startOfLastWeek, $endOfLastWeek])->count();

        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d');
        $lastMonthCounts = Booking::whereBetween('date', [$startOfLastMonth, $endOfLastMonth])->count();

    }



}
