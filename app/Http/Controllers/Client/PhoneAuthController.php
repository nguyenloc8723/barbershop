<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\UserPhone;
use Illuminate\Http\Request;

class PhoneAuthController extends Controller
{
    public function login()
    {
        return view('client.display.login');
    }

    public function otp()
    {
        return view('client.display.otp');
    }

    public function processData(Request $request)
    {
        // Lấy thông tin từ request (số điện thoại)
        $phoneNumber = $request->input('phone_number'); // Đảm bảo khớp với tên trường trong dữ liệu JSON từ client-side

        // Kiểm tra xem số điện thoại đã tồn tại trong cơ sở dữ liệu chưa
        $existingUser = UserPhone::where('phone_number', $phoneNumber)->first();

        if (!$existingUser) {
            // Nếu số điện thoại chưa tồn tại, tạo tài khoản mới
            $user = new UserPhone();
            $user->phone_number = $phoneNumber;
            // Thêm các trường khác (nếu cần): $user->name = $request->input('name');
            $user->save();

            // Thực hiện các tác vụ bạn cần sau khi tạo tài khoản, ví dụ: đăng nhập người dùng, chuyển hướng, vv.

            return response()->json(['message' => 'Tài khoản đã được tạo thành công.']);
        } else {
            // Nếu số điện thoại đã tồn tại, bạn có thể thực hiện các tác vụ khác, chẳng hạn đăng nhập người dùng và chuyển hướng.
            // Ví dụ:
            // Auth::login($existingUser);

            return response()->json(['message' => 'Tài khoản đã tồn tại.']);
        }
    }
}
