<?php

namespace App\Http\Controllers\User\Api;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ProductDetail;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class APICartController extends Controller
{


    public function getCartByIdCustomer($id)
    {
        $carts = Cart::where('user_id', $id)->get();

        return response()->json([
            'success' => true,
            'data' => $carts
        ]);

    }
    public function getCart($id)
{
    // Truy vấn dữ liệu từ bảng carts và các bảng liên quan
  $carts = Cart::leftJoin('product_details', 'product_details.id', '=', 'carts.product_id')
             ->leftJoin('products', 'products.id', '=', 'product_details.product_id')
             ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
             
             ->where('carts.user_id', $id)
             ->select(
                 'carts.*',
                 'products.name as product_name',
                 'product_images.url as image_url',
             )
             ->get();


    // Kiểm tra nếu giỏ hàng rỗng
    if ($carts->isEmpty()) {
        return response()->json([
            'status' => 'error',
            'message' => 'Không tìm thấy giỏ hàng.',
        ], 404);
    }

    // Trả về dữ liệu giỏ hàng dưới dạng JSON
    return response()->json([
        'status' => 'success',
        'data' => $carts,
    ]);
}

}


