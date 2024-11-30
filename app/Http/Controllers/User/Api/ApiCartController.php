<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Voucher;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Hash; // Ensure you are importing Hash correctly
use Illuminate\Support\Facades\Validator;


class ApiCartController extends Controller
{
    //
    public function getVoucher()
    {
        $vouchers = Voucher::all();

        return response()->json([
            'success' => true,
            'data' => $vouchers
        ]);
    }

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


        $carts = Cart::with(['productDetail.product', 'productDetail.product.productImages', 'productDetail.size', 'productDetail.color', 'user.shippingAddresses'])
            ->where('user_id', $id)
            ->get();

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

    public function login(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Vui lòng nhập đầy đủ tên tài khoản và mật khẩu!',
                'errors' => $validator->errors()
            ], 422);
        }

        // Find the user by username
        $user = User::where('username', $request->username)->first();

        // Check if the user exists and verify the password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Đăng nhập thất bại! Tên tài khoản hoặc mật khẩu không chính xác.',
            ], 401);
        }

        // Successfully logged in, return user data
        $userData = [
            'id' => $user->id,
            'username' => $user->username,
            'fullname' => $user->fullname,
            'role_id' => $user->role_id,
            'product_id' => $user->product_id,
        ];

        // Optionally, you can generate a token if you're using token-based authentication
        // $token = $user->createToken('UserToken')->plainTextToken;

        return response()->json([
            'message' => 'Đăng nhập thành công!',
            'data' => $userData
            // 'token' => $token
        ], 200);
    }
}