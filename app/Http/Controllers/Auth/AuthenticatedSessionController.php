<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
//    public function create(): View
//    {
//        return view('auth.login');
//    }
    public function login()
    {
        return view('client.display.login');
    }

    public function otp()
    {
        return view('client.display.otp');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Lấy thông tin từ request (số điện thoại)
        $phoneNumber = $request->input('phone_number'); // Đảm bảo khớp với tên trường trong dữ liệu JSON từ client-side

        // Kiểm tra xem số điện thoại đã tồn tại trong cơ sở dữ liệu chưa
        $existingUser = User::where('phone_number', $phoneNumber)->first();

        if (!$existingUser) {
            // Nếu số điện thoại chưa tồn tại, tạo tài khoản mới
            $user = new User();
            $user->phone_number = $phoneNumber;
            // Thêm các trường khác (nếu cần): $user->name = $request->input('name');
            $user->save();
            Auth::login($user);
            // Thực hiện các tác vụ bạn cần sau khi tạo tài khoản, ví dụ: đăng nhập người dùng, chuyển hướng, vv.
            return redirect()->route('index')->with('message', 'Tài khoản đã được tạo thành công.');
//            return response()->json(['message' => 'Tài khoản đã được tạo thành công.']);
        } else {
            // Nếu số điện thoại đã tồn tại, bạn có thể thực hiện các tác vụ khác, chẳng hạn đăng nhập người dùng và chuyển hướng.
            // Ví dụ:
            // Auth::login($existingUser);
//            $request->authenticate();

            $request->session()->regenerate();

            Auth::login($existingUser);
            return redirect()->route('index')->with('message', 'Tài khoản đã được tạo thành công.');
//            return response()->json(['message' => 'Tài khoản đã tồn tại.']);
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
