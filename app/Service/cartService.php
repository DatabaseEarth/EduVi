<?php

namespace App\Service;


use App\Models\cart;

class cartService
{
    public function Cart_Check($id_product,$id_bill){
        $query_builder = cart::where('Id_Product','=',$id_product)
        ->where('Id_Bill','=',$id_bill)
        ->first();
        return $query_builder;
    }
    public function Cart_Create($id_product,$Id_Bill,$product_Price,$product_Name,$product_Image,$so_luong){
        $query_builder = cart::create([
            'Id_Product'=>$id_product,
            'Id_Bill'=>$Id_Bill,
            'Price_Product'=>$product_Price,
            'Name_Product'=>$product_Name,
            'Image_Product'=>$product_Image,
            'Quantity'=>$so_luong,
            'Total'=>$product_Price*$so_luong,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        return $query_builder;
    }
    public function Cart_UpQuantity($id_product,$so_luong,$id_bill){
        // lấy số lượng cũ + số lượng thêm
        $cart_detail = $this->Cart_Check($id_product,$id_bill);
        $so_luong_moi = $cart_detail->Quantity+$so_luong; // số lượng mới
        $query_builder = cart::where('Id_Product','=',$id_product)
        ->where('Id_Bill','=',$id_bill)
        ->update([
            'Quantity'=>$so_luong_moi,
            'Total'=>$cart_detail->Price_Product*$so_luong_moi,
            'updated_at'=>now()
        ]);
        return $query_builder;
    }
    public function Cart_UploadQuantity($id_product,$so_luong,$id_bill){
        $cart_detail = $this->Cart_Check($id_product,$id_bill);
        $query_builder = cart::where('Id_Product','=',$id_product)
        ->where('Id_Bill','=',$id_bill)
        ->update([
            'Quantity'=>$so_luong,
            'Total'=>$cart_detail->Price_Product*$so_luong,
            'updated_at'=>now()
        ]);
        return $query_builder;
    }
    public function Cart_GetAll_GioHang($Id_Bill) {
        $query_builder = cart::join('product', 'cart.Id_Product', '=', 'product.Id_Product')
        ->where('cart.Id_bill', '=', $Id_Bill)
        ->get(['cart.*', 'product.Quantity as product_quantity']);
        return $query_builder;
    }
    public function Cart_Delete_Product($Id_Cart,$Id_Bill,$Id_Product){
        $query_builder = cart::where('Id_Cart','=',$Id_Cart)
        ->where('Id_Bill','=',$Id_Bill)
        ->where('Id_Product','=',$Id_Product)
        ->delete();
        return $query_builder;
    }
}
