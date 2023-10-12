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
        $user = 4;
        // $result = Results::all();
        // dd($result);
        // $result = Results::pluck('booking_id');
        // if (!$result) {

            $result = Results::all()->pluck('booking_id');
            // dd($result);
            $Booking = Booking::with('stylist', 'User', 'timeSheet', 'reviews')
                ->where('user_id', $user)
                
                ->get();

        return view('client.display.lichsucat', compact('result','Booking'));
    }

    public function create(Request $request)
    {

        Reviews::create($request->all());

        return redirect()->route('show')
            ->with('success', 'Cảm ơn anh/chị đã đánh giá.');
    }
}
