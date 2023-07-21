@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h2 class="text-center">thông tin Đơn hàng </h2>
    </div>
</div>

@if($order)
    <table class="table table-bordered">
        <h2>Thông tin khách hàng</h2>
        <tr>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Điện thoại</th>
        </tr>
        <tr>
            <td>{{ optional($order->customer)->name }}</td>
            <td>{{ optional($order->customer)->email }}</td>
            <td>{{ optional($order->customer)->phone }}</td>
        </tr>
    </table>

    <table class="table table-bordered">
        <h2>thông tin sản phẩm</h2>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Số lượng</th>
        </tr>
        <tr>
            <td>{{ optional($order->product)->name }}</td>
            <td>{{ optional($order->product)->price }}</td>
            <td>{{ $order->quantity }}</td>
        </tr>
    </table>
@else
    <p>Không có thông tin đơn hàng.</p>
@endif

<a class="btn btn-info" href="{{ route('orders.index') }}">Back</a>
@endsection
