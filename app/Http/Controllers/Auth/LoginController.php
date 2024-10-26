<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Thay đổi ở đây

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login'); // Tạo view 'auth.login'
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Sử dụng Auth ở đây
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Đăng nhập thành công
            return redirect()->intended('/'); // Điều hướng đến trang chính
        }

        return back()->withErrors([
            'username' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
