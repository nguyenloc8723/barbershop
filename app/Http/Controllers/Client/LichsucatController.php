<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Results;
use App\Models\Reviews;
use App\Models\Stylist;
use App\Models\Timesheet;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Prompts\Table;
use Illuminate\Support\Facades\DB;

class LichsucatController extends Controller
{
    //
    public function shows()
    {
        $user = 5;

        $result = Results::all()->pluck('booking_id');
        // dd($result);
        $bookings = Booking::with('stylist', 'User', 'timeSheet', 'reviews')
            ->where('user_id', $user)
            ->orderBy('date', 'desc')
            ->first();

       
        // $review = Booking::with('reviews')
        // ->where('user_id', $user)
        // ->get();

        // // foreach ($review as $key) {
        // //     dd($key->reviews);
        // // }

        // dd($review);
    
        return view('client.display.lichsucat', compact('result', 'bookings'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'booking_id' => 'required|unique:reviews',
                'rating' => 'required|between:1,5',
                'comment' => 'required',
            ]);
            Reviews::create($request->all());
        }


        return redirect()->route('show')
            ->with('success', 'Cảm ơn anh/chị đã đánh giá.');
    }
}
