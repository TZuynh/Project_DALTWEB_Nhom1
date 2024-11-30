<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class APIProductDetailController extends Controller
{
    /**
     * Display a listing of the product details.
     */
    public function index()
    {
        // Lấy tất cả chi tiết sản phẩm từ cơ sở dữ liệu
        $productDetails = ProductDetail::all();

        // Trả về danh sách chi tiết sản phẩm dưới dạng JSON
        return response()->json($productDetails, 200);
    }

    /**
     * Store a newly created product detail in storage.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validated = $request->validate([
            'product_id' => 'required|integer|exists:products,id', // Kiểm tra ID sản phẩm có tồn tại trong bảng products
            'attribute' => 'required|string|max:255', // Thuộc tính của chi tiết sản phẩm
            'value' => 'required|string|max:255', // Giá trị của thuộc tính
        ]);

        // Tạo chi tiết sản phẩm mới trong cơ sở dữ liệu
        $productDetail = ProductDetail::create($validated);

        // Trả về chi tiết sản phẩm mới được tạo dưới dạng JSON với mã trạng thái 201 (Created)
        return response()->json($productDetail, 201);
    }

    /**
     * Display the specified product detail.
     */
    public function show(string $id)
    {
        // Tìm chi tiết sản phẩm theo ID
        $productDetail = ProductDetail::find($id);

        // Nếu không tìm thấy chi tiết sản phẩm, trả về lỗi 404
        if (!$productDetail) {
            return response()->json(['message' => 'Product detail not found'], 404);
        }

        // Trả về chi tiết sản phẩm dưới dạng JSON
        return response()->json($productDetail, 200);
    }

    /**
     * Update the specified product detail in storage.
     */
    public function update(Request $request, string $id)
    {
        // Tìm chi tiết sản phẩm theo ID
        $productDetail = ProductDetail::find($id);

        // Nếu không tìm thấy chi tiết sản phẩm, trả về lỗi 404
        if (!$productDetail) {
            return response()->json(['message' => 'Product detail not found'], 404);
        }

        // Validate dữ liệu đầu vào
        $validated = $request->validate([
            'attribute' => 'required|string|max:255', // Thuộc tính của chi tiết sản phẩm
            'value' => 'required|string|max:255', // Giá trị của thuộc tính
        ]);

        // Cập nhật chi tiết sản phẩm
        $productDetail->update($validated);

        // Trả về chi tiết sản phẩm đã cập nhật dưới dạng JSON
        return response()->json($productDetail, 200);
    }

    /**
     * Remove the specified product detail from storage.
     */
    public function destroy(string $id)
    {
        // Tìm chi tiết sản phẩm theo ID
        $productDetail = ProductDetail::find($id);

        // Nếu không tìm thấy chi tiết sản phẩm, trả về lỗi 404
        if (!$productDetail) {
            return response()->json(['message' => 'Product detail not found'], 404);
        }

        // Xóa chi tiết sản phẩm
        $productDetail->delete();

        // Trả về thông báo thành công
        return response()->json(['message' => 'Product detail deleted successfully'], 200);
    }
}
