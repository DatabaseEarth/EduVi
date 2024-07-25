<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
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
    public function product_detail($id)
    {
        $title = 'Chi tiết sản phẩm';
        $product_detail = $this->productService->Product_GetById($id);
        $product_random = $this->productService->Product_RanDom4();
        $product_comment = $this->commentService->Comment_ProductDetail($id);
        return view('clients.detail', compact('title','product_detail','product_random','product_comment'));
    }
}
