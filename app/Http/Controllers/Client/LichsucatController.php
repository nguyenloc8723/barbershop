<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Results;
use App\Models\Reviews;
use App\Models\Stylist;
use App\Models\Timesheet;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Laravel\Prompts\Table;
use Illuminate\Support\Facades\DB;

class LichsucatController extends Controller
{
    //
    public function shows()
    {
        $user = 8;

        $result = Results::all()->pluck('booking_id');
        // dd($result);
        $bookings = Booking::with('stylist', 'User', 'timeSheet', 'reviews')
            ->where('user_id', $user)
            ->orderBy('date', 'desc')
            ->first();


        $reviews = Booking::with('reviews')
        ->whereIn('user_id', [$user])
        ->orderBy('date', 'desc')
        ->get();

        $allReviews = [];

        foreach ($reviews as $booking) {
            foreach ($booking->reviews as $review) {
                
                $booking_id = $review->booking_id;
                $allReviews[] =  $booking_id;
                
            }
        }
        
        // dd($allReviews);
        
       
        return view('client.display.lichsucat', compact('result', 'bookings','reviews','allReviews'));
    }

    public function create(Request $request)
    {
        
            $validate = Validator::make($request->all(), [
                'booking_id' => 'required|unique:reviews',
                'rating' => 'required|between:1,5',
                'comment' => 'required',
            ]);
            
            if($validate->fails()){
                return back()->with('Lỗi!', 'Anh chị vui lòng kiểm tra lại 2 bước đánh giá hoặc anh chị đã đánh giá rồi!')->withInput();
            }else{
                Reviews::create($request->all());
                return redirect()->route('show')
            ->with('success', 'Cảm ơn anh/chị đã đánh giá.');
            }
    }
}
