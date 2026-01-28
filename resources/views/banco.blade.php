@extends('layouts.app')

@section('title', 'Chessboard - ' . $n . 'x' . $n)

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Chessboard</h1>
        <p class="mt-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">Chessboard of size {{ $n }}x{{ $n }}</p>
    </div>

    <div class="bg-white dark:bg-[#161615] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg p-8">
        <div class="mb-6">
            <div class="flex items-center gap-4 mb-4">
                <label class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">Change size:</label>
                <div class="flex gap-2">
                    <a href="{{ route('banco', ['n' => 4]) }}" class="px-3 py-1 text-sm border border-[#19140035] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] rounded-sm text-[#1b1b18] dark:text-[#EDEDEC] transition-colors">4x4</a>
                    <a href="{{ route('banco', ['n' => 8]) }}" class="px-3 py-1 text-sm border border-[#19140035] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] rounded-sm text-[#1b1b18] dark:text-[#EDEDEC] transition-colors">8x8</a>
                    <a href="{{ route('banco', ['n' => 12]) }}" class="px-3 py-1 text-sm border border-[#19140035] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] rounded-sm text-[#1b1b18] dark:text-[#EDEDEC] transition-colors">12x12</a>
                </div>
            </div>
        </div>

        <div class="flex justify-center overflow-x-auto">
            <div class="inline-block border-2 border-[#1b1b18] dark:border-[#EDEDEC]">
                <table class="border-collapse" style="width: min(600px, 90vw);">
                    @for($i = 0; $i < $n; $i++)
                        <tr>
                            @for($j = 0; $j < $n; $j++)
                                @php
                                    $isLight = ($i + $j) % 2 == 0;
                                @endphp
                                <td 
                                    class="border border-[#1b1b18] dark:border-[#EDEDEC] text-center align-middle {{ $isLight ? 'bg-[#f0d9b5] dark:bg-[#3e3e3a]' : 'bg-[#b58863] dark:bg-[#1b1b18]' }}"
                                    style="
                                        width: {{ 100 / $n }}%; 
                                        aspect-ratio: 1; 
                                        min-width: 30px;
                                        min-height: 30px;
                                    "
                                >
                                    @if($n <= 8)
                                        @if($i == 0 || $i == $n - 1)
                                            @php
                                                $pieces = ['♜', '♞', '♝', '♛', '♚', '♝', '♞', '♜'];
                                                $pieceIndex = min($j, count($pieces) - 1);
                                            @endphp
                                            @if($j < count($pieces))
                                                <span class="text-lg font-bold {{ $isLight ? 'text-[#1b1b18] dark:text-[#EDEDEC]' : 'text-[#f0d9b5] dark:text-[#EDEDEC]' }}">
                                                    {{ $pieces[$pieceIndex] }}
                                                </span>
                                            @endif
                                        @elseif($i == 1 || $i == $n - 2)
                                            <span class="text-lg font-bold {{ $isLight ? 'text-[#1b1b18] dark:text-[#EDEDEC]' : 'text-[#f0d9b5] dark:text-[#EDEDEC]' }}">♟</span>
                                        @endif
                                    @endif
                                </td>
                            @endfor
                        </tr>
                    @endfor
                </table>
            </div>
        </div>

        <div class="mt-6 pt-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
            <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-3">Route Information</h3>
            <div class="bg-[#FDFDFC] dark:bg-[#0a0a0a] p-4 rounded-sm border border-[#e3e3e0] dark:border-[#3E3E3A]">
                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mb-2">
                    <strong class="text-[#1b1b18] dark:text-[#EDEDEC]">Route Name:</strong> banco
                </p>
                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mb-2">
                    <strong class="text-[#1b1b18] dark:text-[#EDEDEC]">Route Pattern:</strong> /banco/{n}
                </p>
                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                    <strong class="text-[#1b1b18] dark:text-[#EDEDEC]">Current URL:</strong> {{ route('banco', ['n' => $n]) }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
