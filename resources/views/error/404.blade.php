@extends('layouts.app')

@section('title', '404 - Page Not Found')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center">
        <div class="mb-8">
            <h1 class="text-9xl font-bold text-[#f53003] dark:text-[#FF4433]">404</h1>
        </div>
        
        <div class="bg-white dark:bg-[#161615] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg p-8">
            <h2 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">Page Not Found</h2>
            <p class="text-[#706f6c] dark:text-[#A1A09A] mb-6">
                The page you are looking for could not be found. It may have been moved, deleted, or the URL may be incorrect.
            </p>
            
            <div class="flex gap-4 justify-center">
                <a 
                    href="/"
                    class="px-5 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white border border-black dark:border-[#eeeeec] dark:hover:border-white text-white dark:text-[#1C1C1A] rounded-sm text-sm font-medium transition-colors"
                >
                    Go Home
                </a>
                <a 
                    href="/product"
                    class="px-5 py-2 border border-[#19140035] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] rounded-sm text-sm text-[#1b1b18] dark:text-[#EDEDEC] transition-colors"
                >
                    View Products
                </a>
            </div>
        </div>
    </div>
</div>
@endsection