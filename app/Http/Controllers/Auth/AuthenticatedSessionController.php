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
    public function storeLogin(Request  $request)
    {
        // Lấy thông tin từ request (số điện thoại)
        $phoneNumber = $request->input('phone_number');

        // Kiểm tra xem số điện thoại đã tồn tại trong cơ sở dữ liệu chưa
        $existingUser = User::where('phone_number', $phoneNumber)->first();

        if (!$existingUser) {
            // Nếu số điện thoại chưa tồn tại, tạo tài khoản mới
            $user = new User();
            $user->phone_number = $phoneNumber;
            $user->save();
            $request->session()->regenerate();
            Auth::login($user);

        } else {
            $request->session()->regenerate();
            Auth::login($existingUser);
        }
//        $this->sendSmsViaSpeedSMS($phoneNumber );

    }


    public function sendSms($receiverPhoneNumber)
    {
        $twilioSid = env('TWILIO_SID');
        $twilioAuthToken = env('TWILIO_AUTH_TOKEN');
        $client = new Client($twilioSid, $twilioAuthToken);

        $message = $client->messages->create(
            $receiverPhoneNumber, // Số điện thoại người nhận
            [
                'from' => '+12392177433', // Số điện thoại Twilio của bạn
                'body' => 'Chào mừng em đến với nhà của bọn anh'
            ]
        );

        // Xử lý kết quả nếu cần
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
