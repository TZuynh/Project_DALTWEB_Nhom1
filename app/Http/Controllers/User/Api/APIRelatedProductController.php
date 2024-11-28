<?php

namespace App\Http\Controllers\User\Api;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIRelatedProductController extends Controller
{
    //
    public function getRelatedProducts($productId)
    {
        // Lấy sản phẩm hiện tại từ ID
        $currentProduct = Product::find($productId);

        if (!$currentProduct) {
            return response()->json([
                'message' => 'Sản phẩm không tồn tại!'
            ], 404);
        }

        // Lấy các sản phẩm khác trong cùng category, ngoại trừ sản phẩm hiện tại
        $relatedProducts = Product::where('category_id', $currentProduct->category_id)
            ->where('id', '!=', $productId) // Loại bỏ sản phẩm hiện tại
            ->take(5)  // Giới hạn số lượng sản phẩm liên quan (ví dụ 5 sản phẩm)
            ->get();

        return response()->json($relatedProducts);
    }
}
