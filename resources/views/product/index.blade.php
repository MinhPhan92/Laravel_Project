@extends('layouts.app')

@section('title', isset($title) ? $title : 'Product List')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">{{ isset($title) ? $title : 'Product List' }}</h1>
        <a href="{{ route('add') }}" class="px-5 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white border border-black dark:border-[#eeeeec] dark:hover:border-white text-white dark:text-[#1C1C1A] rounded-sm text-sm font-medium transition-colors">
            Add New Product
        </a>
    </div>

    <div class="bg-white dark:bg-[#161615] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[#FDFDFC] dark:bg-[#0a0a0a] border-b border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">ID</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Name</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Price</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                    @if(isset($products) && count($products) > 0)
                        @foreach($products as $product)
                        <tr class="hover:bg-[#FDFDFC] dark:hover:bg-[#0a0a0a] transition-colors">
                            <td class="px-6 py-4 text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ $product['id'] }}</td>
                            <td class="px-6 py-4 text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ $product['name'] }}</td>
                            <td class="px-6 py-4 text-sm text-[#1b1b18] dark:text-[#EDEDEC]">${{ number_format($product['price'], 2) }}</td>
                            <td class="px-6 py-4 text-sm">
                                <a href="/product/{{ $product['id'] }}" class="text-[#f53003] dark:text-[#FF4433] hover:underline">View</a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                No products found.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection