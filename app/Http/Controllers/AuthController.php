<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Xử lý đăng ký, đăng nhập, đăng xuất (session).
 */
class AuthController extends Controller
{
    /** Hiển thị form đăng ký */
    public function register()
    {
        return view('register');
    }

    /** Xử lý POST đăng ký: validate → tạo user → redirect về login */
    public function checkRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }

    /** Xóa session và đăng xuất */
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

    /** Hiển thị form đăng nhập */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Kiểm tra email/password.
     * Thành công: regenerate session, redirect vào danh sách sản phẩm admin.
     */
    public function checklogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('products.index');
        }
        return redirect()->back()->with('error', 'Login failed');
    }
}
