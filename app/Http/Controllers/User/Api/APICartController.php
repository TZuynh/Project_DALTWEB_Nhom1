<?php

namespace App\Http\Controllers\User\Api;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ProductDetail;
use App\Models\ProductImage;


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
        $carts = Cart::with('ProductDetail', 'Product')
            ->leftJoin('products', 'products.id', '=', 'carts.product_id')
            ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
            ->where('carts.user_id', $id)
            ->select(
                'carts.id as cart_id',
                'carts.user_id',
                'carts.product_id',
                'carts.total_quality',
                'carts.total_amount',
                'products.name as product_name', // Lấy tên sản phẩm
                'product_images.url as image_url', // Lấy URL ảnh sản phẩm
                'carts.created_at', // Thêm thời gian tạo
                'carts.updated_at'  // Thêm thời gian cập nhật
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


    public function editCartItem(Request $req)
    {
        // Validation dữ liệu request
        $validated = $req->validate([
            'user_id' => 'required|integer|exists:users,id', // Kiểm tra user_id có tồn tại trong bảng users
            'product_id' => 'required|integer|exists:products,id', // Kiểm tra product_id có tồn tại trong bảng products
            'total_quality' => 'required|integer|min:1', // Kiểm tra total_quality phải là số nguyên và lớn hơn hoặc bằng 1
        ]);

        // Kiểm tra xem người dùng có giỏ hàng cho sản phẩm này hay không
        $cart = Cart::where('user_id', $req->user_id) // Lọc theo user_id
            ->where('product_id', $req->product_id) // Lọc theo product_id
            ->first();

        // Nếu không tìm thấy giỏ hàng cho sản phẩm của người dùng
        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'msg' => 'Không tồn tại giỏ hàng cho sản phẩm này.'
            ]);
        }

        // Cập nhật số lượng
        $cart->total_quality = $req->total_quality;

        // Lấy thông tin sản phẩm từ bảng `products`
        $product = Product::find($req->product_id); // Lấy thông tin sản phẩm theo product_id

        if ($product) {
            // Tính lại tổng tiền cho sản phẩm trong giỏ hàng
            $cart->total_amount = $cart->total_quality * $product->price; // Cập nhật giá trị total_amount dựa trên số lượng và giá sản phẩm
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'Sản phẩm không tồn tại.'
            ]);
        }

        // Lưu lại thay đổi vào cơ sở dữ liệu
        $cart->save();

        return response()->json([
            'success' => true,
            'msg' => 'Cập nhật giỏ hàng thành công.',
            'data' => $cart // Trả lại thông tin giỏ hàng sau khi cập nhật (optional)
        ]);
    }


    public function delCart(Request $req)
    {
        $carts = Cart::find($req->id);

        if (empty($carts)) {
            return response()->json([
                'success' => false,
                'msg' => 'Không tồn tại giỏ hàng'
            ]);
        }

        $carts->delete();

        return response()->json([
            'success' => true,
            'msg' => 'Xóa thành công giỏ hàng'
        ]);
    }

    public function addCart(Request $req)
    {
        $data = $req->all();

        // Validate the incoming request
        // $validatedData = $req->validate([
        //     'product_id' => 'required|integer',
        //     'user_id' => 'required|integer',
        //     'price' => 'required|numeric',

        //     'total_quality' => 'required|integer',

        //     'total_amount ' => 'required|integer'
        // ]);
        // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
        $existingCart = Cart::where('product_id', $req->product_id)
            ->where('user_id', $req->user_id)
            ->first();

        $product = Product::findOrFail($req->product_id);

        if ($existingCart) {
            // Tăng số lượng sản phẩm trong giỏ hàng
            $existingCart->total_quality += $req->total_quality;
            $existingCart->total_amount = $product->price * $existingCart->total_quality;

            try {
                $existingCart->save();

                return response()->json([
                    'success' => true,
                    'msg' => 'Sản phẩm đã được cập nhật trong giỏ hàng'
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'msg' => 'Cập nhật giỏ hàng thất bại',
                    'error' => $e->getMessage()
                ], 500);
            }
        }

        // Thêm sản phẩm mới vào giỏ hàng
        $cart = new Cart();
        $cart->user_id = $req->user_id;
        $cart->product_id = $req->product_id;
        $cart->total_quality = $req->total_quality;
        $cart->total_amount = $req->total_quality * $product->price;


        try {
            $cart->save();

            return response()->json([
                'success' => true,
                'msg' => 'Thêm sản phẩm vào giỏ hàng thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' => 'Thêm sản phẩm vào giỏ hàng thất bại',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroyAll(Request $request)
    {
        Cart::where('user_id', $request->user_id)->delete();

        return response()->json([
            'success' => true,
            'msg' => 'Xóa thành công'
        ]);
    }

}


