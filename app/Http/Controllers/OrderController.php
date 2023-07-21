<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
public function index() {
    $orders = Order::all();
    return view('orders.index', compact('orders'));
}

   public function show($id){
    // Truy vấn cơ sở dữ liệu để lấy thông tin đơn hàng và các thông tin liên quan
    $order = Order::with(['customer', 'product'])->find($id);

    // Kiểm tra nếu đơn hàng không tồn tại, chuyển hướng về trang trước đó với thông báo lỗi
    if (!$order) {
        return redirect()->back()->with('error', 'Đơn hàng không tồn tại');
    }

    // Nếu đơn hàng tồn tại, hiển thị trang chi tiết đơn hàng với thông tin của đơn hàng
    return view('orders.show', compact('order'));
}

}