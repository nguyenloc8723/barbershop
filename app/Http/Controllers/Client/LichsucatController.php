<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Booking_service;
use App\Models\Results;
use App\Models\Reviews;
use App\Models\Service;
use App\Models\Stylist;
use App\Models\Timesheet;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class LichsucatController extends Controller
{
    //
    public function shows()
    {
        $user = "0365029527";

        // $test = Booking::query()->get();
        // // // $test= DB::table('bookings')->get();
        // dd($test);
        // $result = Results::all()->pluck('booking_id');
        // dd($result);
        $bookings = Booking::query()->with('stylist', 'User', 'timeSheet', 'reviews')
            ->where('user_phone', $user)
            ->orderBy('date', 'desc')
            ->first();


            // dd($bookings);
    //     $userBookings = User::find($user)->bookings()
    // ->with('stylist', 'timeSheet', 'reviews')
    // ->orderBy('date', 'desc')
    // ->first();

        // dd($bookings);
        $reviews = Booking::with('reviews')
        ->whereIn('user_phone', [$user])
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


        return view('client.display.lichsucat', compact('bookings','reviews','allReviews'));
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
    public function DeltailHistory(Request $request, $booking_id) {

        $bookings = Booking::with('stylist', 'User', 'timeSheet', 'reviews')
            ->where('id', $booking_id)
            ->first();

        $combo = Booking_service::with('service')
        ->where('booking_id', $booking_id)
        ->get();
        // dd($combo);
        foreach ($combo as $service) {

        }
        $reviews = Reviews::where('booking_id', $booking_id)->first();

        // dd($reviews);


        return view('client.display.detailHistory', compact('bookings', 'reviews', 'combo'));
    }
}
