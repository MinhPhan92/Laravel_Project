@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Login</h1>
        <p class="mt-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">Enter your credentials to access your account.</p>
    </div>

    <div class="bg-white dark:bg-[#161615] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg p-6">
        <form action="/product/checkLogin" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="username" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                    Username
                </label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    required
                    class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] focus:border-transparent transition-all"
                    placeholder="Enter your username"
                >
            </div>

            <div>
                <label for="pass" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                    Password
                </label>
                <input 
                    type="password" 
                    id="pass" 
                    name="pass" 
                    required
                    class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] focus:border-transparent transition-all"
                    placeholder="Enter your password"
                >
            </div>

            <div class="pt-4">
                <button 
                    type="submit"
                    class="w-full px-5 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white border border-black dark:border-[#eeeeec] dark:hover:border-white text-white dark:text-[#1C1C1A] rounded-sm text-sm font-medium transition-colors"
                >
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
@endsection