{{-- Trang admin: danh sách sản phẩm, lọc theo tên/danh mục, phân trang --}}
@extends('layout.admin')

@section('content')
    <div class="container">
        <h1>Danh sách sản phẩm</h1>

        @if (session('success'))
            <p class="text-success">{{ session('success') }}</p>
        @endif

        <form method="GET" action="{{ route('products.index') }}" class="mb-3">
            <div>
                <label for="keyword">Từ khóa:</label>
                <input type="text" name="keyword" id="keyword" value="{{ request('keyword') }}">
            </div>
            <div>
                <label for="category_id">Danh mục:</label>
                <select name="category_id" id="category_id">
                    <option value="">-- Tất cả --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Lọc</button>
        </form>

        <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm sản phẩm</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Sale price</th>
                    <th>Stock</th>
                    <th>Active</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 60px;">
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category?->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->sale_price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->is_active ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="action-link">Sửa</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection
