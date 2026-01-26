@extends('layouts.app')

@section('title', 'Product Detail')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <a href="/product" class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] transition-colors inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Products
        </a>
    </div>

    <div class="bg-white dark:bg-[#161615] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg p-8">
        <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">Product Detail</h1>
        
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-1">Product ID</label>
                <p class="text-lg text-[#1b1b18] dark:text-[#EDEDEC]">{{ $id }}</p>
            </div>
            
            <div class="pt-4 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                    Product details will be displayed here.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection