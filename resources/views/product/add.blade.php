@extends('layouts.app')

@section('title', 'Add New Product')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Add New Product</h1>
        <p class="mt-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">Fill in the form below to add a new product to the system.</p>
    </div>

    <div class="bg-white dark:bg-[#161615] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg p-6">
        <form action="/product/store" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="name" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                    Product Name
                </label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    required
                    class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] focus:border-transparent transition-all"
                    placeholder="Enter product name"
                >
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                    Price
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#706f6c] dark:text-[#A1A09A]">$</span>
                    <input 
                        type="number" 
                        id="price" 
                        name="price" 
                        step="0.01"
                        min="0"
                        required
                        class="w-full pl-8 pr-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] focus:border-transparent transition-all"
                        placeholder="0.00"
                    >
                </div>
            </div>

            <div class="flex gap-4 pt-4">
                <button 
                    type="submit"
                    class="px-5 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white border border-black dark:border-[#eeeeec] dark:hover:border-white text-white dark:text-[#1C1C1A] rounded-sm text-sm font-medium transition-colors"
                >
                    Add Product
                </button>
                <a 
                    href="/product"
                    class="px-5 py-2 border border-[#19140035] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] rounded-sm text-sm text-[#1b1b18] dark:text-[#EDEDEC] transition-colors inline-flex items-center"
                >
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection