<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Interfaces\NotificationInterface;
use App\Models\Booking;
use App\Models\Booking_service;
use App\Models\payment;
use App\Models\Results;
use App\Models\Reviews;
use App\Models\Service;
use App\Models\Stylist;
use App\Models\Timesheet;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LichsucatController extends Controller
{
    //
    public function shows()
    {
        //lấy Auth
        $user = Auth::id();

        $bookings = Booking::query()->with('User' ,'timeSheet', 'reviews')
            ->where('user_id', $user)
            ->orderBy('created_at', 'desc')
            ->first();

        // dd($bookings);
        $reviews = Booking::with('reviews')
        ->whereIn('user_phone', [$user])
        ->orderBy('created_at', 'desc')
        ->get();

        $allReviews = [];

        foreach ($reviews as $booking) {
            foreach ($booking->reviews as $review) {

                $booking_id = $review->booking_id;
                $allReviews[] =  $booking_id;

            }
        }
        return view('client.display.lichsucat', compact('bookings','reviews','allReviews'));
    }

    public function create(NotificationInterface $notification, Request $request)
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
                $booking_id = $request->booking_id;
                $notification->sendMessage($booking_id, 'Lịch đặt '.$booking_id.' vừa có đánh giá mới.');
                return redirect()->route('client.show')
            ->with('success', 'Cảm ơn anh/chị đã đánh giá.');
            }
    }
    public function DeltailHistory(Request $request, $booking_id) {

        $bookings = Booking::with( 'timeSheet', 'reviews')
            ->where('id', $booking_id)
            ->first();

        $stylist = User::where('id', $bookings->stylist_id)->first();

        $combo = Booking_service::with('service')
        ->where('booking_id', $booking_id)
        ->get();
        // dd($combo);
        foreach ($combo as $service) {

        }
        $reviews = Reviews::where('booking_id', $booking_id)->first();
        $payment = payment::where('booking_id', $booking_id)->first();
        // dd($reviews);


        return view('client.display.detailHistory', compact('bookings', 'reviews', 'combo', 'stylist', 'payment'));
    }
}
