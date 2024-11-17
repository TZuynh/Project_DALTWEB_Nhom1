<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();

        return view('admin.dashboard.index', compact('totalCustomers', 'totalProducts', 'totalOrders'));
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
