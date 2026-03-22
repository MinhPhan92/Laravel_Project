{{-- Chi tiết sản phẩm (admin) --}}
@extends('layout.admin')

@section('content')
    <div class="container">
        <h1>Product Detail Page</h1>
        <p>Product ID: {{ $product->id }}</p>
        <p>Name: {{ $product->name }}</p>
        <p>Price: {{ $product->price }}</p>
        <p>Stock: {{ $product->stock }}</p>
    </div>
@endsection