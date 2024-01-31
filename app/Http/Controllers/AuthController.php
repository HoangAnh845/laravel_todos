<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;


class AuthController extends Controller
{
    public function getLogin()
    {
        # how to check session google_token is valid or not?

        Log::info('This is an informational search.', [
            "google_token_empty" => !empty(session('google_token')),
            "google_token" => session('google_token')
        ]); // Auth::check() ||
        if (!empty(session('google_token'))) {
            return redirect('/todo/list');
        } else {
            // Lấy tất cả các tệp trong thư mục public/images
            $images = File::allFiles(public_path('images'));
            return view('auth.login')->with(array('images' => $images));
        }
    }

    public function authenticate(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Để xác minh thông tin xác thực người dùng
        if (Auth::attempt($credentials)) {
            // Tạo phiên mới cho người dùng
            // Khi người dùng đăng nhập, một phiên được tạo để lưu trữ trạng thái xác thực của họ và các thông tin liên quan khác. 
            // Sử dụng phương thức regenerate() tạo phiên mới, bạn có thể đảm bảo rằng người dùng được xác thực và ủy quyền cho các yêu cầu tiếp theo.
            $request->session()->regenerate();
            // redirect() dùng để chuyển hướng người dùng đến một URL cụ thể 
            return redirect('/todo/list')
                // withSuccess dùng để flash dữ liệu vào phiên, nghĩa là dữ liệu sẽ được lưu trữ tạm thời và có thể được truy cập trong các yêu cầu tiếp theo.
                ->withSuccess('You have successfully logged in!');
        }

        // Nếu xác thực thất bại, hãy đảm bảo ràng thông báo lỗi được trả về cho người dùng
        return back()->withErrors([
            'email' => 'Thông tin xác thực được cung cấp của bạn không khớp với hồ sơ của chúng tôi.',
        ])->onlyInput('email'); // onlyInput() dùng để chỉ định trường trả về 

    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Token in the session
        session(['google_token' => $user->token]);
        $hasEmail = User::where('email', $user->email)->first();

        Log::info("THi si hasEmail", ["hasEmail" => !empty($hasEmail)]);
        // Kiểm tra email người dùng login bằng google đã lưu vào database hay chưa?
        if (empty($hasEmail)) {
            User::create([
                'name' => $user->name,
                'email' => $user->email,
                'provider' => "Google",
            ]);
        }

        return redirect('/todo/list')
            ->withSuccess('You have successfully logged in!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login')
            ->with('flash_notification.message', 'Logged out successfully');
    }
}
