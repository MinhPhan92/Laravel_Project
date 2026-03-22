{{-- Chi tiết sản phẩm + khối đã xem gần đây --}}
@extends('layout.frontend')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $product->name }}</h1>
            <p class="text-muted">
                Category: {{ $product->category?->name ?? 'N/A' }}
            </p>
            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>
            @if($product->description)
                <p class="mt-3">{{ $product->description }}</p>
            @endif
        </div>
        <div class="col-md-4">
            @if(isset($recentlyViewedProducts) && $recentlyViewedProducts->isNotEmpty())
                <h5>Recently viewed</h5>
                <ul class="list-unstyled">
                    @foreach($recentlyViewedProducts as $recent)
                        <li class="mb-2">
                            <a href="{{ route('frontend.products.show', $recent->id) }}">
                                {{ $recent->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection

