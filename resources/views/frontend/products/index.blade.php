{{-- Danh sách sản phẩm shop (có thể có từ khóa tìm kiếm) --}}
@extends('layout.frontend')

@section('content')
    <h1 class="mb-4">Products</h1>

    @if(isset($keyword) && $keyword !== '')
        <p>Search results for: <strong>{{ $keyword }}</strong></p>
    @endif

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">
                            Category: {{ $product->category?->name ?? 'N/A' }}
                        </p>
                        <p class="card-text">
                            <strong>${{ number_format($product->price, 2) }}</strong>
                        </p>
                        <a href="{{ route('frontend.products.show', $product->id) }}" class="btn btn-primary">View detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection

