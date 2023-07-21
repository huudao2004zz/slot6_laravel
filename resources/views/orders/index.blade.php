@extends('layouts.app')

@section('content')
 
<div class="row">
    <div class="col-lg-12">
        <h2 class="text-center">List infomation Orders</h2>
    </div>
    <div class="col-lg-12 text-center">
        @if($orders->isEmpty()) <!-- Kiểm tra nếu không có đơn hàng -->
            <p>Không có thông tin đơn hàng.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Tên sản phẩm</th>
                        <!-- Thêm các cột khác tùy thuộc vào ngữ cảnh của ứng dụng -->
                    </tr>
                </thead>
                <!-- ... -->

<tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ optional($order->customer)->name }}</td>
            <td>{{ optional($order->product)->name }}</td>
            <td>
                <!-- Liên kết đến trang show với ID đơn hàng cụ thể -->
                <div class="col-lg-12 text-center" style="margin-top: 10px; margin-bottom: 10px;">
                    <a class="btn btn-success" href="{{ route('orders.show', ['id' => $order->id]) }}">Thông tin chi tiết đơn hàng</a>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>

<!-- ... -->

            </table>
        @endif
    </div>
</div>
@endsection
