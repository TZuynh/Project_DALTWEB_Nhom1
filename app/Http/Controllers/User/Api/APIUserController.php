<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIUserController extends Controller
{
    /**
     * Lấy thông tin người dùng đã đăng nhập.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getUserInfo(Request $request)
    {
        // Lấy thông tin người dùng đã đăng nhập từ token
        $user = Auth::user();

        return response()->json([
            'message' => 'User information retrieved successfully',
            'user' => $user
        ]);
    }

    /**
     * Cập nhật thông tin người dùng.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateUserInfo(Request $request)
    {
        // Xác thực thông tin người dùng
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            // Các trường thông tin khác có thể bổ sung vào đây
        ]);

        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();

        // Cập nhật thông tin người dùng
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            // Cập nhật các trường khác nếu cần
        ]);

        return response()->json([
            'message' => 'User information updated successfully',
            'user' => $user
        ]);
    }

    /**
     * Thay đổi mật khẩu người dùng.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        // Kiểm tra mật khẩu hiện tại
        if (!\Hash::check($request->current_password, Auth::user()->password)) {
            return response()->json([
                'message' => 'Mật khẩu hiện tại không đúng.',
            ], 400);
        }

        // Cập nhật mật khẩu mới
        $user = Auth::user();
        $user->update([
            'password' => \Hash::make($request->new_password),
        ]);

        return response()->json([
            'message' => 'Password changed successfully',
        ]);
    }
}
