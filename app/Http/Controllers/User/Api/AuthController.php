<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
