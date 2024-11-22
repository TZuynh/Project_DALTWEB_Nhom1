<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use App\Models\Color;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductDetailController extends Controller
{
    // Hiển thị form thêm chi tiết sản phẩm
  
    public function create(Product $product)
    {
        $dsSize = Size::all(); // Lấy danh sách Size
        $dsColor = Color::all(); // Lấy danh sách màu sắc
        $defaultQuantity = 1; // Số lượng mặc định nếu cần
    
        return view('product.create', compact('product', 'dsSize', 'dsColor', 'defaultQuantity'));
    }
    

    // Lưu chi tiết sản phẩm
    public function store(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'size_id' => 'required|exists:sizes,id',
            'color_id' => 'required|exists:colors,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Lấy sản phẩm theo ID
        $product = Product::findOrFail($productId);
    
        // Lưu chi tiết sản phẩm
        $productDetail = new ProductDetail();
        $productDetail->product_id = $product->id;
        $productDetail->size_id = $request->size_id;
        $productDetail->color_id = $request->color_id;
        $productDetail->quality = $request->quality;
        $productDetail->save();
    
        // Lưu ảnh (nếu có)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/img/add', $imageName);
                ProductImage::create([
                    'product_detail_id' => $productDetail->id,
                    'url' => $imageName,
                ]);
            }
        }
    
    
        // Quay lại trang chi tiết sản phẩm với thông báo thành công
        return redirect()->route('product.detail', $product->id)->with('success', 'Thêm chi tiết sản phẩm thành công!');
    }
    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        // Eager load the product details to include the quantity field
        $dsDetail = $product->productDetails;
    
        return view('product.details', compact('product', 'dsDetail'));
    }
}