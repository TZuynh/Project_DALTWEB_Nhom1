<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;




class VNPayController extends Controller
{
    public function createPayment(Request $request)
    {
        // $amount = $request->amount;
        // if (!$amount || !is_numeric($amount) || $amount <= 0) {
        //     return response()->json(['error' => 'Số tiền thanh toán không hợp lệ!'], 400);
        // }
        // return response()->json(['message' => 'Số tiền thanh toán hợp lệ!', 'amount' => $amount], 200);


        $vnp_TmnCode = env('VNP_TMN_CODE'); // Mã cửa hàng
        $vnp_HashSecret = env('VNP_HASH_SECRET'); // Chuỗi bí mật
        $vnp_Url = env('VNP_URL'); // URL thanh toán VNPay
        $vnp_Returnurl = env('VNP_RETURN_URL'); // URL trả về sau thanh toán

        // Dữ liệu đơn hàng
        $vnp_TxnRef = now()->timestamp; // Mã giao dịch
        $vnp_OrderInfo = "Thanh toan don hang"; // Thông tin đơn hàng
        $vnp_OrderType = "billpayment"; // Loại giao dịch
        $vnp_Amount = $request->amount * 100; // Số tiền (VND, nhân với 100 để thành tiền xu)
        $vnp_Locale = "vn"; // Ngôn ngữ (vn - Việt Nam)
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $request->ip(); // Địa chỉ IP của người dùng

        // Dữ liệu cần truyền lên VNPay
        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        // Sắp xếp các tham số theo thứ tự alphabet
        ksort($inputData);

        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $query = rtrim($query, '&');

        $vnp_Url = $vnp_Url . "?" . $query;

        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;
        }

        // Trả về URL thanh toán VNPay
        return response()->json(['vnpUrl' => $vnp_Url]);
    }
    public function paymentSuccess(Request $request)
    {
        $vnpPayDate = $request->input('vnp_PayDate');
        $txnRef = $request->input('vnp_TxnRef');
        $data2 = $request->input('data2'); // Shipping address
        $data3 = $request->input('data3'); // Voucher ID
        $data4 = $request->input('data4'); // Total product value
        $data5 = $request->input('data5'); // Total order value
        $cartItems = $request->input('data'); // Dữ liệu giỏ hàng
        // $paymentMethod = $request->input('selectedPaymentMethod');
        // Log::info($paymentMethod);
        try {

            // switch ($paymentMethod) {
            //     case 'cash':
            //         $paymentMethodId = 1;
            //         break;
            //     case 'bank':
            //         $paymentMethodId = 2;
            //         break;
            //     case 'vnpay':
            //         $paymentMethodId = 3;
            //         break;
            //     case 'momo':
            //         $paymentMethodId = 4;
            //         break;
            //     default:
            //         throw new \Exception('Phương thức thanh toán không hợp lệ');
            // }

            // Kiểm tra xem vnp_TxnRef đã tồn tại trong bảng orders chưa
            $existingOrder = Order::where('txn_ref', $txnRef)->first();
            if ($existingOrder) {
                return response()->json([
                    'success' => false,
                    'message' => 'Giao dịch này đã được xử lý trước đó!',
                ], 400);
            }
            $order = Order::create([
                'user_id' => $data2['user_id'],
                'shipping_address_id' => $data2['id'],
                'shipment_status_id' => 1,
                'voucher_id' => $data3,
                'total_product_value' => $data4,
                'charge' => 30000,
                'total_order_value' => $data5,
                'txn_ref' => $txnRef,  // Lưu txnRef để kiểm tra trong tương lai
                'created_at' => now()->parse($vnpPayDate),
            ]);

            // Tạo bản ghi trong bảng `payment`
            // $payment = Payment::create([
            //     'order_id' => $order->id,
            //     'payment_method_id' => $paymentMethodId,
            //     'payment_data' => $order->created_at,
            // ]);

            // Lặp qua từng sản phẩm trong giỏ hàng và thêm vào bảng order_details
            foreach ($cartItems as $item) {
                $price = $item['product_detail']['product']['price']; // Lấy giá sản phẩm
                $quantity = $item['total_quality']; // Số lượng
                $totalValue = $price * $quantity; // Tổng giá trị sản phẩm

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_detail_id' => $item['product_detail_id'], // ID chi tiết sản phẩm
                    'shipment_status_id' => 1, // Trạng thái giao hàng mặc định là 1
                    'voucher_id' => $data3,
                    'price' => $price,
                    'quality' => $quantity,
                    'total_value' => $totalValue,
                ]);
            }

            // Xóa các sản phẩm trong bảng cart
            $cartIds = collect($cartItems)->pluck('id');
            DB::table('carts')->whereIn('id', $cartIds)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Đơn hàng đã được lưu thành công!',
                'order_id' => $order->id,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi lưu đơn hàng.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // public function paymentSuccessCash(Request $request)
    // {
    //     $txnRef = "cash";
    //     $data2 = $request->input('data2'); // Shipping address
    //     $data3 = $request->input('data3'); // Voucher ID
    //     $data4 = $request->input('data4'); // Total product value
    //     $data5 = $request->input('data5'); // Total order value
    //     $cartItems = $request->input('data'); // Dữ liệu giỏ hàng
    //     $paymentMethod = $request->input('data6');


    //     try {
    //         switch ($paymentMethod) {
    //             case 'cash':
    //                 $paymentMethodId = 1;
    //                 break;
    //             case 'bank':
    //                 $paymentMethodId = 2;
    //                 break;
    //             case 'vnpay':
    //                 $paymentMethodId = 3;
    //                 break;
    //             case 'momo':
    //                 $paymentMethodId = 4;
    //                 break;
    //             default:
    //                 throw new \Exception('Phương thức thanh toán không hợp lệ');
    //         }
    //         // Kiểm tra xem vnp_TxnRef đã tồn tại trong bảng orders chưa
    //         $existingOrder = Order::where('txn_ref', $txnRef)->first();
    //         if ($existingOrder) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Giao dịch này đã được xử lý trước đó!',
    //             ], 400);
    //         }
    //         $order = Order::create([
    //             'user_id' => $data2['user_id'],
    //             'shipping_address_id' => $data2['id'],
    //             'shipment_status_id' => 1,
    //             'voucher_id' => $data3,
    //             'total_product_value' => $data4,
    //             'charge' => 30000,
    //             'total_order_value' => $data5,
    //             'txn_ref' => $txnRef,  // Lưu txnRef để kiểm tra trong tương lai
    //         ]);

    //         // Tạo bản ghi trong bảng `payment`
    //         $payment = Payment::create([
    //             'order_id' => $order->id,
    //             'payment_method_id' => $paymentMethodId,
    //             'payment_data' => $order->created_at,
    //         ]);

    //         // Lặp qua từng sản phẩm trong giỏ hàng và thêm vào bảng order_details
    //         foreach ($cartItems as $item) {
    //             $price = $item['product_detail']['product']['price']; // Lấy giá sản phẩm
    //             $quantity = $item['total_quality']; // Số lượng
    //             $totalValue = $price * $quantity; // Tổng giá trị sản phẩm

    //             OrderDetail::create([
    //                 'order_id' => $order->id,
    //                 'product_detail_id' => $item['product_detail_id'], // ID chi tiết sản phẩm
    //                 'shipment_status_id' => 1, // Trạng thái giao hàng mặc định là 1
    //                 'voucher_id' => $data3,
    //                 'price' => $price,
    //                 'quality' => $quantity,
    //                 'total_value' => $totalValue,
    //             ]);
    //         }

    //         // Xóa các sản phẩm trong bảng cart
    //         $cartIds = collect($cartItems)->pluck('id');
    //         DB::table('carts')->whereIn('id', $cartIds)->delete();

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Đơn hàng đã được lưu thành công!',
    //             'order_id' => $order->id,
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Có lỗi xảy ra khi lưu đơn hàng.',
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }
}