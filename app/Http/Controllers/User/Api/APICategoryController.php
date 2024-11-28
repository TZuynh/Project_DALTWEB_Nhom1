<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ProductDetail;
use App\Models\Category;


class APICategoryController extends Controller
{
    //
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
        $dsLoaiSP = ProductDetail::with('products')->leftJoin('images', 'products.id', '=', 'images.product_id')
        ->where('products.id', $id)
        ->select('products.*', 'images.name as image_name')
        ->first()->get();
        
        return response()->json([
            'success' => true,
            'data' => $dsLoaiSP
        ]);
    }
}
