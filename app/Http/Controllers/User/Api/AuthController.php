<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string|exists:users,username',
            'password' => 'required|string',
            'role_id' => 'required|integer',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return response()->json([
                'message' => 'Đăng nhập thành công!',
                'user' => $user,
            ]);
        }

        return response()->json([
            'message' => 'Tên đăng nhập hoặc mật khẩu không chính xác.',
        ], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json(['message' => 'Đăng xuất thành công']);
    }

    /**
     * Đăng ký người dùng mới.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'password' => 'required|string|min:8', // 'confirmed' yêu cầu trường 'password_confirmation'
        ]);

        // Nếu xác thực thất bại, trả về lỗi
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Tạo người dùng mới
        $user = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Mã hóa mật khẩu
            'role_id' => 2, // Giả sử role_id là 2 cho người dùng bình thường
        ]);

        // Tạo token cho người dùng sau khi đăng ký thành công
        $token = Auth::login($user);

        // Trả về thông tin người dùng và token
        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201); // Trả về mã HTTP 201 (Created)
    }
}
