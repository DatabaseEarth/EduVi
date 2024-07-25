<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Service\billService;
use App\Service\cartService;

class OrderController extends Controller
{
    public $billService;
    public $cartService;
    public function __construct()
    {
        $this->billService = new billService;
        $this->cartService = new cartService;
    }
    public function order()
    {
        $title = 'Đơn hàng';
        $order_list = $this->billService->Bill_GetAll(10);
        return view('admin.order', compact('title','order_list'));
    }
    public function bill_update(Request $request){
        $this->billService->Bill_Update($request->Status,$request->Id_Bill);
        return redirect()->back();
    }
    public function order_detail($id){
        $title='Chi tiết đơn hàng';
        $cart_detail = $this->billService->Bill_GetById($id);
        // dd($cart_detail);
        return view('admin.order_detail',compact('title','cart_detail'));
    }
}
