<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Results;
use App\Models\User;
use App\Models\Booking;
use App\Models\Stylist;
use App\Http\Resources\BookingResource;

class ApiDashboardController extends Controller
{
    public function dailySales(){
        $data['totalUser'] = User::whereDate('created_at', now()->toDateString())->count();
        $data['totalBooking'] = Booking::whereDate('date', now()->toDateString())->count();
        $data['totalResult'] = Results::whereDate('created_at', now()->toDateString())->count();

        return response()->json($data);
    }

    public function dataSixMonths(){

        $result = [];

        for ($i = 5; $i >= 0; $i--) {
            $startOfMonth = Carbon::now()->subMonths($i)->startOfMonth();
            $endOfMonth = Carbon::now()->subMonths($i)->endOfMonth();
    
            $userCount = User::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
    
            $stylistCount = Stylist::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
    
            $data[] = [
                'month' => $startOfMonth->format('M'),
                'user_count' => $userCount,
                'stylist_count' => $stylistCount,
            ];
        }
    
        return response()->json($data);
            
    }

    public function monthlyRevenue(){
        
        $revenueByMonth = \DB::table('results')
            ->join('booking_services', 'results.booking_id', '=', 'booking_services.booking_id')
            ->join('services', 'booking_services.service_id', '=', 'services.id')
            ->join('bookings', 'results.booking_id', '=', 'bookings.id')
            ->select(
                \DB::raw('MONTH(bookings.date) as month'),
                \DB::raw('SUM(services.price) as revenue')
            )
            ->whereYear('bookings.date', now()->year)
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->pluck('revenue', 'month')
            ->all();

        for ($month = 1; $month <= 12; $month++) {
            if (!array_key_exists($month, $revenueByMonth)) {
                $data[] = [
                    'month' => $month,
                    'revenue' => 0,
                ];
            }else{
                $data[] = [
                    'month' => $month,
                    'revenue' => $revenueByMonth[$month],
                ];
            }
        }

        return response()->json($data);
    }

    public function latestStylist(){
        $data = Stylist::orderByDesc('id')->get()->take(6);
        return response()->json($data);
    }

    public function latestBooking(){
        $bookings = Booking::orderByDesc('id')->get()->take(7);
        return BookingResource::collection($bookings);
    }
}
