{{-- Form thêm sản phẩm (upload ảnh, chọn danh mục) --}}
@extends('layout.admin')

@section('content')
    <div class="container">
        <h1>Thêm sản phẩm</h1>

        @if ($errors->any())
            <ul class="text-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </div>

            <div>
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" step="0.01" value="{{ old('price') }}">
            </div>

            <div>
                <label for="sale_price">Sale Price:</label>
                <input type="number" name="sale_price" id="sale_price" step="0.01" value="{{ old('sale_price') }}">
            </div>

            <div>
                <label for="stock">Stock:</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock') }}">
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea name="description" id="description">{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" accept="image/*">
            </div>

            <div>
                <label>
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                    Active
                </label>
            </div>

            <div>
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id">
                    <option value="">-- None --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection
