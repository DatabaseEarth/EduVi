<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\bill_put;
use Illuminate\Http\Request;

use App\Service\billService;
use App\Service\cartService;
use App\Service\productService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public $billService;
    public $cartService;
    public $productService;
    public function __construct()
    {
        $this->billService = new billService;
        $this->cartService = new cartService;
        $this->productService = new productService;
    }
    public function cart()
    {
        $title='Giỏ hàng';
        // phải đăng nhập mới được xem giỏ hàng
        if (Auth::check()) {
            // kiểm tra người dùng có giỏ hàng chưa
            $check_order = $this->billService->Bill_Check(Auth::user()->Id_User);
            $product_random = $this->productService->Product_RanDom4();
            if ($check_order) { // nếu có thì lấy hết 
                $cart_list = $this->cartService->Cart_GetAll_GioHang($check_order->Id_Bill);
                $Id_Bill = $check_order->Id_Bill;
                // dd($cart_list);
                return view('clients.cart', compact('title','cart_list','Id_Bill','product_random'));
            }else {
                return view('clients.cart', compact('title','product_random'));
            }
        }else{ // chưa đăng nhập thì về với cát bụi
            return redirect()->route('login');
        }
    }
    public function cart_detail(){
        $title = 'Chi tiết đơn hàng';
        $cart_list = $this->billService->Bill_GetByUser(Auth::user()->Id_User,'desc',10);
        return view('clients.cart_detail',compact('title','cart_list'));
    }
    public function quantity_cart(Request $request){
        // echo $request->Id_Product,$request->Id_Bill,$request->Quantity;
        $this->cartService->Cart_UploadQuantity($request->Id_Product,$request->Quantity,$request->Id_Bill);
        return redirect()->back();
    }
    public function delete_product(Request $request){
        $this->cartService->Cart_Delete_Product($request->Id_Cart,$request->Id_Bill,$request->Id_Product);
        return redirect()->back();
    }
    public function delete_bill(Request $request){
        $this->billService->Bill_Delete($request->Id_Bill);
        return redirect()->back();
    }
    public function bill(bill_put $request){
        
        $this->billService->bill_confirm(
            Auth::user()->Id_User,
            $request->Name_Orderer,
            $request->Email_Orderer,
            $request->Phone_Orderer,
            $request->Address_Orderer,
            $request->Name_recipient,
            $request->Total,
            $request->Ship,
            $request->Total+$request->Ship,
            $request->Id_Bill
        );
        return redirect()->back();

    }
    public function addToCart(Request $request){
        $id_product = $request->Id_Product;
        // lấy thông tin sản phẩm lúc mua
        $product = $this->productService->Product_GetById($id_product);
        // lấy số lượng lúc mua
        $so_luong = $request->SoLuong;
        // kiểm tra đã đăng nhập chưa
        if (Auth::check()) {
            // kiểm tra người dùng có giỏ hàng chưa
            $check_order = $this->billService->Bill_Check(Auth::user()->Id_User);
            if($check_order){
                // Kiểm tra đã có sản phẩm trong giỏ hàng chưa
                $check_cart = $this->cartService->Cart_Check($id_product,$check_order->Id_Bill);
                if($check_cart){ // nếu có thì tăng số lượng
                    $this->cartService->Cart_UpQuantity($id_product,$so_luong,$check_order->Id_Bill);
                    return redirect()->back();
                }else{ // chưa thì thêm vô cùng với thông tin và số lượng
                    // thêm sản phẩm vào cart
                    $this->cartService->Cart_Create($id_product,$check_order->Id_Bill,$product->Price,$product->Name,$product->Image,$so_luong);
                    return redirect()->back();
                }
            }else { // chưa có bill thì tạo bill
                $kq = $this->billService->Bill_Create(Auth::user()->Id_User);
                // sau khi tạo lấy thông tin bill
                $check_order = $this->billService->Bill_Check(Auth::user()->Id_User);
                if ($kq) {
                    // thêm sản phẩm vào cart
                    $this->cartService->Cart_Create($id_product,$check_order->Id_Bill,$product->Price,$product->Name,$product->Image,$so_luong);
                    return redirect()->back();
                }
            }
        }else{
            return redirect()->route('login');
        }
    }
}
