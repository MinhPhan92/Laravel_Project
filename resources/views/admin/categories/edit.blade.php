@extends('layout.admin')

@section('content')
    <div class="container">
        <h1>Chỉnh sửa danh mục</h1>

        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf

            <div>
                <label for="name">Tên danh mục</label>
                <input id="name" name="name" value="{{ $category->name }}">
            </div>

            <div>
                <label for="parent_id">Danh mục cha</label>
                <select id="parent_id" name="parent_id">
                    <option value="">-- Chọn danh mục cha --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                            @selected($cat->id == $category->parent_id)>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
        </form>
    </div>
@endsection