<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function login()
    {
        return view('auth.login');
    }

    public function otp()
    {
        return view('auth.otp');
    }

    /**
     * Handle an incoming authentication request.
     */
//$request->authenticate();

    public function storeLogin(Request  $request)
    {
        // Lấy thông tin từ request (số điện thoại)
        $phoneNumber = $request->input('phone_number');
        // Kiểm tra xem số điện thoại đã tồn tại trong cơ sở dữ liệu chưa
        $existingUser = User::where('phone_number', $phoneNumber)->first();

        if (!$existingUser) {
            $user = new User();
            $user->phone_number = $phoneNumber;
            $user->save();
            $request->session()->regenerate();
            Auth::login($user);
        } else {
            $request->session()->regenerate();
            Auth::login($existingUser);
//            $this->sendSms($phoneNumber);
        }

        $userRole = Auth::user()->user_type;
        // Thực hiện chuyển hướng dựa trên quyền
        if ($userRole === 'user') {
            return response()->json(['user_type' => 'user']);
        } elseif ($userRole === 'admin') {
            return response()->json(['user_type' => 'admin']);
        }

    }


//    public function sendSms($receiverPhoneNumber)
//    {
//        $twilioSid = env('TWILIO_SID');
//        $twilioAuthToken = env('TWILIO_AUTH_TOKEN');
//        $client = new Client($twilioSid, $twilioAuthToken);
//
//        $message = $client->messages->create(
//            $receiverPhoneNumber, // Số điện thoại người nhận
//            [
//                'from' => '+12392177433', // Số điện thoại Twilio của bạn
//                'body' => 'Chào mừng em đến với nhà của bọn anh'
//            ]
//        );
//
//        // Xử lý kết quả nếu cần
//    }

// sms VN
    public function sendSms($phoneNumber)
    {
        if (Str::startsWith($phoneNumber, '+84')) {
            // Nếu có, loại bỏ tiền tố "+84"
            $phoneNumber = Str::substr($phoneNumber, 3);
        }
        $APIKey = "DA549A5A42CFAEA8824C0CE30C0DEF";
        $SecretKey = "6302BDD6EE57AB25612AEBDC6CD87E";
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


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }




}
