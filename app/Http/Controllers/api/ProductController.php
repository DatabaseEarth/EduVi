<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

use App\Service\productService;
use App\Service\commentService;

class ProductController extends Controller
{
    public $productService;
    public $commentService;
    public function __construct()
    {
        $this->productService = new productService;
        $this->commentService = new commentService;
    }
    //
    public function product_detail($id){
        $title = 'Chi tiết sản phẩm';
        $product_detail = $this->productService->Product_GetById($id);
        $product_random = $this->productService->Product_RanDom4();
        $product_comment = $this->commentService->Comment_ProductDetail($id);
        $data = [
            'title'=>$title,
            'product_detail'=>new ProductResource($product_detail),
            'product_random'=>ProductResource::collection($product_random),
            'product_comment'=>CommentResource::collection($product_comment),
        ];
        return response()->json($data,200);
    }
}
