<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\Booking_service;
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
        $bookedBooking = Booking::where('status',3)->count();
        $notBookedBooking = Booking::where('status',1)->count();
        $cancelledBooking = Booking::where('status',0)->count();
        $totalBooking = $bookedBooking + $notBookedBooking + $cancelledBooking;
        $totalPrice = Booking::where('status',3)->sum('price');


        $today = now()->format('Y-m-d');
        // $todayCompletedCounts = Results::distinct('booking_id')->whereDate('created_at', $today)->count();
        $todayCompletedCounts = Booking::where('status','3')->whereDate('created_at', $today)->count();
        $todayPendingCounts = Booking::where('status','1')->whereDate('created_at', $today)->count();
        $todayCanceledCounts = Booking::where('status','0')->whereDate('created_at', $today)->count();
        $todayTotalPrice = Booking::where('status',3)->whereDate('created_at', $today)->sum('price');


        $yesterday = Carbon::yesterday()->format('Y-m-d');
        // $yesterdayCompletedCounts = Results::distinct('booking_id')->whereDate('created_at', $yesterday)->count();
        $yesterdayCompletedCounts = Booking::where('status','3')->whereDate('created_at', $yesterday)->count();
        $yesterdayPendingCounts = Booking::where('status','1')->whereDate('created_at', $yesterday)->count();
        $yesterdayCanceledCounts = Booking::where('status','0')->whereDate('created_at', $yesterday)->count();
        $yesterdayTotalPrice = Booking::where('status',3)->whereDate('created_at', $yesterday)->sum('price');



        $startOfMonth = now()->startOfMonth()->format('Y-m-d');
        $endOfMonth = now()->endOfMonth()->format('Y-m-d');
        $thisMonthTotalPrice = Booking::where('status',3)->whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('price');


        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d');
        $lastMonthTotalPrice = Booking::where('status',3)->whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->sum('price');



        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $chartBooking = Booking::select(
            DB::raw('DATE(created_at) as order_date'),
            DB::raw('COUNT(CASE WHEN status = 3 THEN 1 END) as completed_total'),
            DB::raw('COUNT(CASE WHEN status = 1 THEN 1 END) as pending_total'),
            DB::raw('COUNT(CASE WHEN status = 0 THEN 1 END) as canceled_total')
        )
        ->groupBy('order_date')
        ->orderBy('order_date', 'asc')
        ->get();

        $startOfWeek = now()->startOfWeek()->format('Y-m-d');
        $endOfWeek = now()->endOfWeek()->format('Y-m-d');

        $chart7DaysBooking = Booking::select(
            DB::raw('DATE(created_at) as order_date'),
            DB::raw('COUNT(CASE WHEN status = 3 THEN 1 END) as completed_total'),
            DB::raw('COUNT(CASE WHEN status = 1 THEN 1 END) as pending_total'),
            DB::raw('COUNT(CASE WHEN status = 0 THEN 1 END) as canceled_total')
        )
        ->whereBetween(DB::raw('DATE(created_at)'), [$startOfWeek, $endOfWeek])
        ->groupBy('order_date')
        ->orderBy('order_date', 'asc')
        ->get();

        $orderSummary = Booking::select(
            DB::raw('DATE(created_at) as order_date'),
            DB::raw('COUNT(CASE WHEN status = 3 THEN 1 END) as completed_total'),
            DB::raw('COUNT(CASE WHEN status = 1 THEN 1 END) as pending_total'),
            DB::raw('COUNT(CASE WHEN status = 0 THEN 1 END) as canceled_total'),
            DB::raw('COUNT(id) as booked_total'),
            DB::raw('SUM(CASE WHEN status = 3 THEN price ELSE 0 END) as daily_revenue')
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
    public function service(){
//        $duplicateServices = Booking_Service::query()
//            ->select('service_id', \DB::raw('COUNT(service_id) AS total_occurrences'))
//            ->groupBy('service_id')
//            ->havingRaw('COUNT(service_id) > 1')
//            ->orderByDesc('total_occurrences')
//            ->with('service:id,name,description,price') // Chỉ lấy những trường cần thiết từ bảng service
//            ->get();


        $duplicateServices = Booking_Service::query()
            ->select('service_id', \DB::raw('COUNT(service_id) AS total_occurrences'))
            ->whereMonth('created_at', '=', now()->month) // Chỉ lấy dữ liệu của tháng hiện tại
            ->groupBy('service_id')
            ->havingRaw('COUNT(service_id) > 1')
            ->orderByDesc('total_occurrences')
            ->with('service:id,name,description,price')
            ->get();

        $totalPrices = [];
        // Sắp xếp theo tổng giá giảm dần
        $duplicateServices = $duplicateServices->sortByDesc(function ($item) {
            return $item->service->price * $item->total_occurrences;
        });

// Lấy ra 5 dòng đầu tiên
        $duplicateServices = $duplicateServices->take(5);

        foreach ($duplicateServices as $duplicateService) {
            $service = $duplicateService->service;
            $totalPrice = $service->price * $duplicateService->total_occurrences;

            $totalPrices[] = [
                'total_price' => $totalPrice,
                'name' => $service->name,
                'description' => $service->description,
            ];
        }

        $totalOccurrences = $duplicateServices->take(5)->map(function ($duplicateService) {
            $service = $duplicateService->service;

            return [
                'total_occurrences' => $duplicateService->total_occurrences,
                'name' => $service->name,
                'description' => $service->description,
            ];
        });

        // Lấy tổng tiền đặt lịch theo tháng (Đặt Lịch)
        $revenueByMonth = Booking::select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(price) as total'))
            ->whereYear('created_at', '=', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

// Tính phần trăm tăng giảm (nếu có ít nhất hai tháng dữ liệu)
        $percentChange = [];
        if (count($revenueByMonth) >= 2) {
            for ($i = 1; $i < count($revenueByMonth); $i++) {
                $currentMonth = $revenueByMonth[$i]->total;
                $prevMonth = $revenueByMonth[$i - 1]->total;

                $percentage = (($currentMonth - $prevMonth) / $prevMonth) * 100;

                $percentChange[] = [
                    'month' => $revenueByMonth[$i]->month,
                    'percentage' => $percentage,
                    'currentMonth' => $currentMonth,
                    'prevMonth' => $prevMonth,
                ];
            }
        }
//        dd($revenueByMonth[0]->total, $percentChange);
//        dd($percentChange);
        return view('admin.statistical.service',
            compact('totalPrices','totalOccurrences',
                'revenueByMonth','percentChange'));
    }
}
