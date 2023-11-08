<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
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

        $bookings = Booking::query()->with('User', 'timeSheet', 'reviews')
            ->where('user_id', $user)
            ->orderBy('created_at', 'desc')
            ->first();

        //lấy tất cả dữ liệu booking có user_id
        $booking = Booking::with('User', 'timeSheet', 'reviews')
        ->where('user_id', $user)
        ->where('status', 2)
        ->get();
        $reviewIds = []; // Mảng để lưu trữ tất cả các booking_id 'rating', 'stylist', 
        $images = [];
        // $reviews = [];
        foreach ($booking as $review) {
            
            $reviewIds[] = $review;
            // dd($review->id);
            $image = Results::where('booking_id', $review->id)->first();  
            $images[] = $image;
        }
        
        // dd($image);
        return view('client.display.lichsucat', compact('bookings','reviewIds', 'review', 'images'));
    }

    public function create(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'booking_id' => 'required|unique:reviews',
            'rating' => 'required|between:1,5',
            'comment' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('Lỗi!', 'Anh chị vui lòng kiểm tra lại 2 bước đánh giá hoặc anh chị đã đánh giá rồi!')->withInput();
        } else {
            Reviews::create($request->all());
            return redirect()->route('client.show')
                ->with('success', 'Cảm ơn anh/chị đã đánh giá.');
        }
    }
    public function DeltailHistory(Request $request, $id)
    {

        $bookings = Booking::with('timeSheet', 'reviews')
            ->where('id', $id)
            ->first();

        $stylist = User::where('id', $bookings->stylist_id)->first();

        $combo = Booking_service::with('service')
            ->where('booking_id', $id)
            ->get();
        $image = Results::where('booking_id', $id)
            ->get();
        // dd($image);
        foreach ($combo as $service) {
        }
        $reviews = Reviews::where('booking_id', $id)->first();
        $payment = payment::where('booking_id', $id)->first();
        // dd($reviews);


        return view('client.display.detailHistory', compact('bookings', 'reviews', 'combo', 'stylist', 'payment', 'image'));
    }
}
