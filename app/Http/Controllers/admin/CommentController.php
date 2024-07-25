<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Service\commentService;
use App\Service\productService;

class CommentController extends Controller
{
    public $commentService;
    public $productService;
    public function __construct()
    {
        $this->commentService = new commentService;
        $this->productService = new productService;
    }
    public function comment()
    {
        $title = 'Bình luận';
        $comment_product = $this->productService->Product_Comment();
        // dd($comment_product);
        return view('admin.comment', compact('title','comment_product'));
    }
    public function feedback_comment($id)
    {
        $product = $this->productService->Product_GetById($id);
        $data_product_comment = $this->commentService->Comment_ProductDetail($id);
        $title = 'Phản hồi';
        return view('admin.comment_feedback', compact('title','product','data_product_comment'));
    }
}
