<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function checkRegister(Request $request){
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('pass');
        $confirmPassword = $request->input('confirm_pass');

        $errors = [];

        if(empty($username)){
            $errors[] = "Username is required.";
        }

        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "A valid email is required.";
        }

        if(empty($password)){
            $errors[] = "Password is required.";
        }

        if($password !== $confirmPassword){
            $errors[] = "Passwords do not match.";
        }

        if(!empty($errors)){
            return view('register', ['errors' => $errors]);
        }

        return "Registration successful for user: " . htmlspecialchars($username);
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('login');
    }

    // hiển thị form đăng nhập
    public function showLogin(){
        return view('login');
    }

    // check login
    public function checklogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/admin');
        }
        return redirect()->back()->with('error', 'Login failed');
    }
    //logout
}
