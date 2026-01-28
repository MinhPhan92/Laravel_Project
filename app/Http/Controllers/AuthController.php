<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // hiển thị form đăng ký
    public function SignIn(){
        return view('auth.SignIn');
    }

    // xử lý dữ liệu đăng ký
    public function CheckSignIn(Request $request){
        $student = [
            'username' => 'minhpd',
            'password' => '123abc',
            'mssv' => '0114567',
            'lopmonhoc' => '67pm1',
            'gioitinh' => 'Nam',
        ];

        // lấy dữ liệu từ form
        $data = $request->all();

        // kiểm tra password và repass
        if($data['password'] != $data['repass']){
            return "đăng ký thất bại";
        }

        // kiểm tra thông tin sinh viên
        if(
            $data['username'] === $student['username'] &&
            $data['password'] === $student['password'] &&
            $data['mssv'] === $student['mssv'] &&
            $data['lopmonhoc'] === $student['lopmonhoc'] &&
            $data['gioitinh'] === $student['gioitinh']
        ){
            return "đăng ký thành công";
        }
        return "đăng ký thất bại";
    }
}
