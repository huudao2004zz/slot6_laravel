<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    

    public function index()
    {
        // Lấy danh sách tất cả các sản phẩm từ cơ sở dữ liệu
        $products = Product::all();

        // Trả về view 'products.index' và truyền biến $products vào view
        return view('products.index', compact('products'));
    }
    public function create()
    
    {
        // Kiểm tra quyền của người dùng
        $this->middleware('role:admin');
        
        return view('products.create');
    }

    /**
     * Store the newly created resource in storage.
     *

     */
public function store(Request $request)
{
    // Xác minh rằng $request có dữ liệu hợp lệ gửi từ form
    $request->validate([
        'name' => 'required',
        'price' => 'required',
    ]);

    // Tạo một sản phẩm mới với dữ liệu từ form
    $product = new Product();
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->save();

    // Sau khi lưu, chuyển hướng về trang danh sách sản phẩm hoặc trang chi tiết sản phẩm
    return redirect()->route('products.index')->with('success', 'Đã thêm sản phẩm mới thành công!');
}

    /**
     * Display the resource.
     *
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     *
     */
    public function edit(product $product)
    {
          $this->middleware('role:admin');

        return view('products.edit',compact('product'));
    }


    public function update(Request $request, product $product)
    {
        $request->validate([
             'name' =>'required',
             'price' => 'required',

        ]);
        $product ->update($request->all());
        return redirect()->route('products.index')->with('Successfully','update successfully');
       
    }

    /**
     * Remove the resource from storage.
     *
     */
    public function destroy( product $product)
    {
          $this->middleware('role:admin');

        $product ->delete();
        return redirect()->route('products.index');
    }
}
