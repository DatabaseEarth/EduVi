<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
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

    public function header_nav(){
        $category_list = $this->categoryService->Category_GetAll();
        $data = [
            'category_list'=>CategoryResource::collection($category_list)
        ];
        return response()->json($data,200);
    }
    public function category_detail($id){
        $category_list = $this->productService->Product_GetByIdDm($id,9);
        $data = [
            'category_detail'=>ProductResource::collection($category_list)
        ];
        return response()->json($data,200);
    }
}
