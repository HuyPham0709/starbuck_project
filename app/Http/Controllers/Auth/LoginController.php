<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Tạo view login.blade.php
    }

    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Đăng nhập người dùng
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/'); // Chuyển hướng đến trang chính sau khi đăng nhập
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect('/'); // Chuyển hướng về trang chính
    }
}
