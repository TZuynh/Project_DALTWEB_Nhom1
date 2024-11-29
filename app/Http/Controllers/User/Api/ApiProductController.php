<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy tất cả sản phẩm từ cơ sở dữ liệu
        $products = Product::all();

        // Trả về danh sách sản phẩm dưới dạng JSON
        return response()->json($products, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validated = $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        // Tạo sản phẩm mới trong cơ sở dữ liệu
        $product = Product::create($validated);

        // Trả về sản phẩm mới được tạo dưới dạng JSON với mã trạng thái 201 (Created)
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::find($id);

        // Nếu không tìm thấy sản phẩm, trả về lỗi 404
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Trả về sản phẩm dưới dạng JSON
        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::find($id);

        // Nếu không tìm thấy sản phẩm, trả về lỗi 404
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Validate dữ liệu đầu vào
        $validated = $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        // Cập nhật sản phẩm
        $product->update($validated);

    }
}
