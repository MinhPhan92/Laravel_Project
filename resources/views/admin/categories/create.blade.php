@extends('layout.admin')

@section('content')
    <div class="container">
        <h1>Thêm danh mục mới</h1>

        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            <div>
                <label for="name">Tên danh mục</label>
                <input id="name" name="name" placeholder="Tên danh mục">
            </div>

            <div>
                <label for="parent_id">Danh mục cha</label>
                <select id="parent_id" name="parent_id">
                    <option value="">-- Chọn danh mục cha --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Thêm danh mục</button>
        </form>
    </div>
@endsection