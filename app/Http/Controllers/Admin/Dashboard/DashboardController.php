<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalCustomers = Customer::count();
        $totalProducts = Product::count();
//        $totalOrders = Order::count();

        $startDate = $request->input('start_date')
            ? Carbon::parse($request->input('start_date'))->startOfDay()
            : Carbon::now()->startOfMonth();

        $endDate = $request->input('end_date')
            ? Carbon::parse($request->input('end_date'))->endOfDay()
            : Carbon::now()->endOfMonth();

        $orders = Order::whereBetween('created_at', [$startDate, $endDate])->get();

        $totalRevenue = $orders->sum('total_order_value');
        $totalOrders = $orders->count();

        return view('admin.dashboard.index', compact('totalCustomers', 'totalProducts', 'totalOrders','totalRevenue','startDate', 'endDate'));
    }

    public function edit()
    {
        $settings = \App\Models\Footer::all()->pluck('title', 'content');
        return view('admin.dashboard.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token', '_method');

        foreach ($data as $title => $value) {
            \App\Models\Footer::updateOrCreate(['title' => $title], ['content' => $value]);
        }

        return redirect()->back()->with('success', 'Cập nhật thông tin website thành công!');
    }
}
