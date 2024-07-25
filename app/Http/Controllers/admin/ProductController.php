<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\product_post;
use App\Http\Requests\product_put;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Service\productService;
use App\Service\categoryService;

class ProductController extends Controller
{
    
    public $productService;
    public $categoryService;
    public function __construct()
    {
        $this->productService = new productService;
        $this->categoryService = new categoryService;
    }
    public function product()
    {
        $title = 'Sản phẩm';
        $products = $this->productService->GetProduct_Admin();
        return view('admin.product', compact('title','products'));
    }
    public function product_add()
    {
        $title = 'Thêm sản phẩm';
        $category_list = $this->categoryService->Category_GetAll();
        return view('admin.product_add', compact('title','category_list'));
    }
    public function product_create(product_post $request){
        
        $imageName = $this->productService->saveImage($request);
        $kq = $this->productService->Product_Add($request->Name, $request->Price, $imageName, $request->Describe, $request->Hide, $request->Hot, $request->Quantity, $request->Id_Category);
        if ($kq) {
            return redirect()->route('admin.product.read');
        }else{
            echo 'Bug tới Bug tới!';
        }
    }
    public function product_edit($id)
    {
        $title = 'Sửa sản phẩm';
        $category_list = $this->categoryService->Category_GetAll();
        $product_detail = $this->productService->Product_GetById($id);
        return view('admin.product_edit', compact('title','category_list','product_detail'));
    }
    public function product_update(product_put $request,$id){
        $product_detail = $this->productService->Product_GetById($id);
        $imageName = $product_detail->Image;
        // Kiểm tra và xóa file ảnh cũ
        if ($request->hasFile('Image') && $imageName) {
            $this->productService->deleteOldImage($imageName);
        }
        // Xử lý lưu file ảnh
        if ($request->hasFile('Image')){
            $imageName = $this->productService->saveImage($request);
        }
        // dd($imageName);
        $kq = $this->productService->Product_Update($request->Name, $request->Price, $imageName, $request->Describe, $request->Hide, $request->Hot, $request->Quantity, $request->Id_Category, $id);
        if ($kq) {
            return redirect()->route('admin.product.read');
        }else{
            echo 'Bug tới Bug tới!';
        }
    }
    public function product_delete($id){
        $product_detail = $this->productService->Product_GetById($id);
        $imageName = $product_detail->Image;
        // Kiểm tra và xóa file ảnh cũ
        if ($imageName) {
            $this->productService->deleteOldImage($imageName);
        }
        $this->productService->Product_Delete($id);
        return redirect()->route('admin.product.read');
    }
    // // ================================================
    
    
}
