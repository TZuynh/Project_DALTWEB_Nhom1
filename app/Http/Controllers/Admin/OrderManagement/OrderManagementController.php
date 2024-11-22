<?php

namespace App\Http\Controllers\Admin\OrderManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\ProductImage;
use App\Models\ShipmentStatus;



class OrderManagementController extends Controller
{
    //
    public function index()
    {

        $orders = Order::with(['shipmentStatus', 'shippingAddress', 'voucher', 'payment', 'payment.paymentMethod'])->get();
        $orderdetails = OrderDetail::with([
            'productDetail',
            'productDetail.product',
            'productDetail.size',
            'productDetail.color',
            'order',
            'shipmentStatus',
            'voucher',
            // Thêm mối quan hệ với bảng product_images
            // 'productDetail.productImages' => function ($query) {
            //     // Sử dụng 'productDetail' thay vì '$orderdetails'
            //     $query->where('product_images.product_id', '=', 'productDetail.product.id')
            //         ->where('product_images.color_id', '=', 'productDetail.color.id');
            // }
        ])->get();

        // Duyệt qua các orderdetails để lấy ảnh từ product_images
        // $allProductImages = []; // Mảng chứa tất cả ảnh

        foreach ($orderdetails as $orderDetail) {
            $productDetail = $orderDetail->productDetail;

            $productId = $productDetail->product_id;
            $colorId = $productDetail->color_id;

            // Truy vấn product_images
            // $productImages = ProductImage::where('product_id', $productId)
            //     ->where('color_id', $colorId)
            //     ->get();

            // Truy vấn lấy ảnh đầu tiên
            $firstImage = ProductImage::where('product_id', $productId)
                ->where('color_id', $colorId)
                ->first();

            // Lưu vào mảng

            $orderDetail->productDetail->productImages = $firstImage ? $firstImage->url : null; // Đường dẫn ảnh

            // $allProductImages[] = [
            //     'product_id' => $productId,
            //     'color_id' => $colorId,
            //     'first_image' => $firstImage ? $firstImage->url : null, // Đường dẫn ảnh
            // ];
        }
        $shipmentStatus = ShipmentStatus::All();

        // Kiểm tra toàn bộ kết quả
        // dd($orders->toArray());

        return view('admin.ordermanagement.index', compact('orders', 'orderdetails', 'shipmentStatus'));
    }

    public function updateOrderStatus(Request $request, $orderId)
    {
        // Find the order by ID
        $order = Order::find($orderId);

        // Check if order exists
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Validate the incoming request
        $request->validate([
            'status_id' => 'required|exists:shipment_statuses,id', // Ensure valid status ID
        ]);

        // Update the order status
        $order->shipment_status_id = $request->status_id;
        $order->save();

        // Return a response indicating success
        return response()->json([
            'message' => 'successfully',
            'status' => $order->shipment_status_id // Include the updated order details here
        ]);
    }
}