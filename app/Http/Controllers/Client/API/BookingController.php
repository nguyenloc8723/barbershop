<?php

namespace App\Http\Controllers\Client\API;

use App\Http\Controllers\Controller;
use App\Mail\MailStylist;
use App\Models\Booking;
use App\Models\Booking_service;
use App\Models\Service;
use App\Models\Service_categories;
use App\Models\Stylist;
use App\Models\Timesheet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    // đang kế thừa class base
    public $model = Stylist::class;
    public $modelChooService = Service_categories::class;
    public $imgService = Service::class;
    public $booking = Booking::class;
    private $user_phone = '';
    public function index()
    {
//        $data = $this->model::all();
        $data = User::query()->where('user_type', 'STYLIST')->get();
        return response()->json($data);
    }
    public function timeSheetDetail(string $id)
    {
        $dataStylist = User::query()->with('timeSheet')->where('id',$id)->first();
        $dataTimeSheet = Timesheet::all();
        Log::info($dataTimeSheet);
        return response()->json(['dataStylist'=>$dataStylist, 'dataTimeSheet'=>$dataTimeSheet]);
    }

    public function randomStylist(){
        $stylist =User::inRandomOrder()->where('user_type', 'STYLIST')->first();
        return response()->json($stylist);
    }



    // hàm loadService dùng khi chọn dịch vụ cắt
    public function loadService()
    {
        $data = $this->modelChooService::query()->with('service')->get();
        $service = $this->imgService::query()->with('images')->get();
        return response()->json(['data' => $data, 'service' => $service]);
    }

    public function pullRequest(Request $request)
    {
        Log::info($request->user_phone);
        $booking = $request->all();
        $model = new $this->booking;
        $model->fill($booking);
        $model->save();
        
        $bookingDone_id = $model->id;
        $service = $request->arrayIDService;


        foreach ($service as $value) {
            $booking_service = new Booking_service;
            $booking_service->fill([
                'booking_id' => $bookingDone_id,
                'service_id' => $value,
            ]);
            $booking_service->save();
        }
        //Send mail tới stylist khi có đơn hàng mới
        $service = Booking_service::with('service')->where('booking_id', $bookingDone_id)->get();
        Log::info($service);
        $stylist = User::query()->where('id', $request->stylist_id)->first();
        Mail::to($stylist->email)->send(new MailStylist($booking,$service));
        //end send mail stylist
        $this->sendSms($request->user_phone);
        return response()->json(['success'=>$bookingDone_id]);
    }

    public function stylistDetail(string $id){
        $data = User::query()->where('id',$id)->first();
        return response()->json($data);
    }

    public function bookingDone($id){
        $data = $this->booking::query()->where('id',$id)->with('service','timeSheet')->first();
        return response()->json($data);
    }

    public function bookingDestroy($id){
        $this->booking::where('id', $id)->update(['status' => 0]);
        $this->booking::where('id',$id)->delete();

        Booking_service::where('booking_id',$id)->delete();
        return response()->json(['success'=>'Xóa thành công']);
    }

    function setUserPhone(Request $request){
        $user_phone = $request->user_phone;
        Log::info($user_phone);
        return response()->json(['user_phone'=>$user_phone])->view('client.booking.index');
    }

    public function bookingNotification($user_phone){
        $bookings = Booking::with(['timeSheet','stylist'])->where('user_phone', $user_phone)

                    ->where('status', 1)
                    ->whereDoesntHave('results')
                    ->get();
        return response()->json($bookings);
    }

    public function sendSms($phoneNumber)
    {
        if (Str::startsWith($phoneNumber, '+84')) {
            // Nếu có, loại bỏ tiền tố "+84"
            $phoneNumber = Str::substr($phoneNumber, 3);
        }
//        $APIKey = "DA549A5A42CFAEA8824C0CE30C0DEF";
//        $SecretKey = "6302BDD6EE57AB25612AEBDC6CD87E";
        $APIKey = "44A12426B71D5CDBD86F3EB12DD2F4";
        $SecretKey = "3FDAB16BC3DBB1DD12814080488663";
        $YourPhone = $phoneNumber;
        Log::info($YourPhone);
        $Content = "Cam on quy khach da su dung dich vu cua chung toi. Chuc quy khach mot ngay tot lanh!";

        $SendContent = urlencode($Content);
        $data = "http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone=$YourPhone&ApiKey=$APIKey&SecretKey=$SecretKey&Content=$SendContent&Brandname=Baotrixemay&SmsType=2";

        $curl = curl_init($data);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);

        $obj = json_decode($result, true);
        if ($obj['CodeResult'] == 100) {
            Log::info("thành công ");
        } else {
            Log::info("lỗi  ");
        }
    }

}
