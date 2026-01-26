@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Register</h1>
        <p class="mt-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">Create a new account to get started.</p>
    </div>

    <div class="bg-white dark:bg-[#161615] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg p-6">
        @if(isset($errors) && count($errors) > 0)
            <div class="mb-6 p-4 bg-[#fff2f2] dark:bg-[#1D0002] border border-[#f53003] dark:border-[#FF4433] rounded-sm">
                <ul class="list-disc list-inside space-y-1 text-sm text-[#f53003] dark:text-[#FF4433]">
                    @foreach($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/register" method="POST" class="space-y-6">
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
                <label for="email" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                    Email
                </label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required
                    class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] focus:border-transparent transition-all"
                    placeholder="Enter your email"
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

            <div>
                <label for="confirm_pass" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                    Confirm Password
                </label>
                <input 
                    type="password" 
                    id="confirm_pass" 
                    name="confirm_pass" 
                    required
                    class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] focus:border-transparent transition-all"
                    placeholder="Confirm your password"
                >
            </div>

            <div class="pt-4">
                <button 
                    type="submit"
                    class="w-full px-5 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white border border-black dark:border-[#eeeeec] dark:hover:border-white text-white dark:text-[#1C1C1A] rounded-sm text-sm font-medium transition-colors"
                >
                    Register
                </button>
            </div>

            <div class="text-center pt-4 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                    Already have an account? 
                    <a href="/login" class="text-[#f53003] dark:text-[#FF4433] hover:underline">Login</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection