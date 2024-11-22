<?php

namespace App\Http\Controllers\Admin\CommentManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\ShippingAddress;
use App\Models\Comment;
use App\Models\User;




class CommentManagementController extends Controller
{
    //
    public function index()
    {
        $comments = Comment::with([
            'user',
            'productDetail',
            'productDetail.size',
            'productDetail.color',
        ])->get();

        foreach ($comments as $comment) {
            $productDetail = $comment->productDetail;

            $productId = $productDetail->product_id;
            $colorId = $productDetail->color_id;

            $firstImage = ProductImage::where('product_id', $productId)
                ->where('color_id', $colorId)
                ->first();

            // Lưu vào mảng

            $comment->productDetail->productImages = $firstImage ? $firstImage->url : null;

            $shippingAddress = ShippingAddress::where('user_id', $comment->user->id)->first();
            $comment->user->shippingAddress = $shippingAddress;
        }
        // dd($comment->user->shippingAddress->toArray());
        // dd($comment->user->shippingAddress->toArray());


        return view('admin.commentmanagement.index', compact('comments'));
    }

    public function approve($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        $comment->status = 1;
        $comment->is_hide = 1;
        $comment->save();

        return response()->json([
            'success' => true,
            'message' => 'Đơn hàng đã được duyệt.'
        ]);
    }

    public function update($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        $comment->is_hide = 0;
        $comment->save();

        return response()->json([
            'success' => true,
            'message' => 'Đơn hàng đã được ẩn.'
        ]);
    }

    // public function delete($commentId)
    // {
    //     $comment = Comment::findOrFail($commentId);

    //     $comment->is_hide = 0;
    //     $comment->save();

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Đơn hàng đã được ẩn.'
    //     ]);
    // }
}