<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Models\Category;




class APIProductController extends Controller
{
    //
    public function getAllProducts()
    {
        // Lấy tất cả sản phẩm với các thông tin liên quan
        $products = Product::with('category', 'productDetails','images')->get();

        return response()->json($products);
    }
    public function sanPhamTheoLoai(Request $request, $id)
    { 
        $loaiSP = ProductDetail::with('product','images')->find($id);
         if(empty($loaiSP))
         { return response()->json([
             'success'=>false, 
             'data'=>"Loại sản phẩm này không tồn tại" 
            ]); }

          return response()->json([ 
            'success'=>true, 
            'data'=>$loaiSP 
        ]); 
        }
        public function dsLoaiSanPham(){
            $dsLoaiSP = Category::All();
        
            return response()->json([
                'success' => true,
                'data' => $dsLoaiSP
            ]);
    
        }
    

}
