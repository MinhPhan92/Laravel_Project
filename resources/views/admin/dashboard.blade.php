{{-- Trang dashboard: thống kê số lượng --}}
@extends('layout.admin')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>

        <div class="row">
            <div class="col-md-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalProducts }}</h3>
                        <p>Total Products</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $activeProducts }}</h3>
                        <p>Active Products</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $totalCategories }}</h3>
                        <p>Categories</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $totalUsers }}</h3>
                        <p>Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

