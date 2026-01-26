<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        $title = "Product List";
        return view("product.index", ['title' => $title,
        'products'=>[
            ['id'=>1, 'name'=>'Product A', 'price'=>100],
            ['id'=>2, 'name'=>'Product B', 'price'=>150],
            ['id'=>3, 'name'=>'Product C', 'price'=>200]
        ]
        ]);
    }

    public function create(){
        return view("product.add");
    }

    public function get(string $id = "123"){
        return view("product.detail", ['id' => $id]);
    }

    public function store(Request $request){
        var_dump($request->all());
    }

    public function checkLogin(Request $request){
        if($request->input('username') == 'minhpd' && $request->input('pass') == '123456'){
            return "Đăng nhập thành công";
        }
        else{
            return "Đăng nhập thất bại";
        }
    }

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
}
