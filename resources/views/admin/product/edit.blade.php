@extends('layout.admin')

@section('content')
    <div class="container">
        <h1>Chỉnh sửa sản phẩm</h1>

        <form action="/products/{{ $product->id }}" method="post">
            @method('PUT')
            @csrf

            <div>
                <label for="name">Product Name:</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}">
            </div>

            <div>
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" value="{{ $product->price }}">
            </div>

            <div>
                <label for="stock">Stock:</label>
                <input type="number" name="stock" id="stock" value="{{ $product->stock }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection