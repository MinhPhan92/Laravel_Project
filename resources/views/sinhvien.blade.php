@extends('layouts.app')

@section('title', 'Student Information')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Student Information</h1>
        <p class="mt-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">Introduction information of the student doing this assignment.</p>
    </div>

    <div class="bg-white dark:bg-[#161615] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg p-8">
        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Full Name</label>
                    <p class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">{{ $name }}</p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Student ID (MSSV)</label>
                    <p class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">{{ $mssv }}</p>
                </div>
            </div>

            <div class="pt-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                <h2 class="text-xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">About This Assignment</h2>
                <p class="text-[#706f6c] dark:text-[#A1A09A] leading-relaxed">
                    This is a Laravel web application project demonstrating various routing features including:
                    route naming, route parameters with default values, route grouping, and dynamic views.
                </p>
            </div>

            <div class="pt-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-3">Route Information</h3>
                <div class="bg-[#FDFDFC] dark:bg-[#0a0a0a] p-4 rounded-sm border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mb-2">
                        <strong class="text-[#1b1b18] dark:text-[#EDEDEC]">Route Name:</strong> sinhvien
                    </p>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mb-2">
                        <strong class="text-[#1b1b18] dark:text-[#EDEDEC]">Route Pattern:</strong> /sinhvien/{name}/{mssv}
                    </p>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                        <strong class="text-[#1b1b18] dark:text-[#EDEDEC]">Default Values:</strong> name = "Luong Xuan Hieu", mssv = "123456"
                    </p>
                </div>
            </div>

            <div class="pt-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-3">Example Links Using Route Names</h3>
                <div class="space-y-2">
                    <a href="{{ route('sinhvien') }}" class="block px-4 py-2 bg-[#FDFDFC] dark:bg-[#0a0a0a] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm text-sm text-[#1b1b18] dark:text-[#EDEDEC] hover:bg-[#f53003] dark:hover:bg-[#FF4433] hover:text-white transition-colors">
                        Default values: {{ route('sinhvien') }}
                    </a>
                    <a href="{{ route('sinhvien', ['name' => 'Nguyen Van A', 'mssv' => '987654']) }}" class="block px-4 py-2 bg-[#FDFDFC] dark:bg-[#0a0a0a] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm text-sm text-[#1b1b18] dark:text-[#EDEDEC] hover:bg-[#f53003] dark:hover:bg-[#FF4433] hover:text-white transition-colors">
                        Custom values: {{ route('sinhvien', ['name' => 'Nguyen Van A', 'mssv' => '987654']) }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
