{{-- Form sửa sản phẩm --}}
@extends('layout.admin')

@section('content')
    <div class="container">
        <h1>Chỉnh sửa sản phẩm</h1>

        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div>
                <label for="name">Product Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}">
            </div>

            <div>
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price) }}">
            </div>

            <div>
                <label for="sale_price">Sale Price:</label>
                <input type="number" name="sale_price" id="sale_price" step="0.01" value="{{ old('sale_price', $product->sale_price) }}">
            </div>

            <div>
                <label for="stock">Stock:</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}">
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea name="description" id="description">{{ old('description', $product->description) }}</textarea>
            </div>

            <div>
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" accept="image/*">
                @if($product->image)
                    <div class="mt-2">
                        <p>Current image:</p>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 150px;">
                    </div>
                @endif
            </div>

            <div>
                <label>
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                    Active
                </label>
            </div>

            <div>
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id">
                    <option value="">-- None --</option>
                    @foreach($categories ?? [] as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection