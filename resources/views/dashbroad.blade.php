@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Trang chủ</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 text-center" style="margin-top: 10px; margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('orders.index') }}">Quản lý Đơn hàng</a>
        </div>
        <div class="col-lg-6 text-center" style="margin-top: 10px; margin-bottom: 10px;">
            <a class="btn btn-success" href="{{ route('products.index') }}">Quản lý Sản phẩm</a>
        </div>
    </div>
@endsection
