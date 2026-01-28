@extends('layouts.app')

@section('title', 'Hello World')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white dark:bg-[#161615] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg p-8 text-center">
        <h1 class="text-4xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">Hello World</h1>
        <p class="text-[#706f6c] dark:text-[#A1A09A]">Welcome to Laravel!</p>
    </div>
</div>
@endsection