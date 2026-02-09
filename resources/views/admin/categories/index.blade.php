@extends('layout.admin')

@section('content')
    <div class="container">
        <h1>Danh mục sản phẩm</h1>

        <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm danh mục mới</a>

        <table>
            <thead>
                <tr>
                    <th>Tên danh mục</th>
                    <th>Danh mục cha</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent?->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="action-link">Sửa</a>
                            <form action="{{ route('categories.delete', $category->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection