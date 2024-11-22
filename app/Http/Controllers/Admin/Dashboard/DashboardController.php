<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon; // Sử dụng Carbon để xử lý thời gian


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalCustomers = Customer::count();
        $totalProducts = Product::count();
        //$totalOrders = Order::count();


        // Bộ lọc ngày
        $startDate = $request->input('start_date') 
            ? Carbon::parse($request->input('start_date'))->startOfDay() 
            : Carbon::now()->startOfMonth();

        $endDate = $request->input('end_date') 
            ? Carbon::parse($request->input('end_date'))->endOfDay() 
            : Carbon::now()->endOfMonth();

        // Truy vấn các đơn hàng trong khoảng thời gian
        $orders = Order::whereBetween('created_at', [$startDate, $endDate])->get();

        // Tính tổng doanh thu và số lượt mua
        $totalRevenue = $orders->sum('total_order_value'); // Dựa vào cột total_order_value
        $totalOrders = $orders->count(); // Đếm số lượng đơn hàng

        return view('admin.dashboard.index', compact('totalCustomers', 'totalProducts', 'totalOrders','totalRevenue','startDate', 'endDate'));
    }

    public function edit()
    {
        $settings = \App\Models\WebsiteSetting::all()->pluck('value', 'key');
        return view('admin.dashboard.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token', '_method');

        foreach ($data as $key => $value) {
            \App\Models\WebsiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->back()->with('success', 'Cập nhật thông tin website thành công!');
    }
}
