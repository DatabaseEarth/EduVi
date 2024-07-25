<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Service\categoryService;
use App\Service\productService;

class CategoryController extends Controller
{
    public $categoryService;
    public $productService;
    public function __construct()
    {
        $this->categoryService = new categoryService;
        $this->productService = new productService;
    }
    public function category_detail(Request $request,$id)
    {
        $title = 'Danh mục';
        $Id_Category = $this->categoryService->Category_GetById($id);
        $product_ByDM = $this->productService->Product_GetByIdDm($id,12,$request->filter,$request->keyword);
        return view('clients.category', compact('title','product_ByDM','Id_Category'));
    }
}
