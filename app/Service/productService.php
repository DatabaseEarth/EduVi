<?php

namespace App\Service;


use App\Models\product;
use Illuminate\Support\Facades\DB;

class productService
{
    public function Product_GetAll(){
        $query_builder = product::all();
        return $query_builder;
    }
    public function GetProduct_Admin(){
        $query_builder = product::join('category', 'product.Id_Category', '=', 'category.Id_Category')
        ->select('product.*', 'category.name as category_name')
        ->where('product.Hide','=',1)
        ->orderBy('Id_Product','desc')
        ->paginate(10);
        return $query_builder;
    }
    public function saveImage($request)
    {
        $image = $request->file('Image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/products'), $imageName);
        return $imageName;
    }
    public function Product_Add($Name, $Price, $imageName, $Describe, $Hide, $Hot, $Quantity, $Id_Category){
        $query_builder = product::create([
            'Name'=>$Name,
            'Price'=>$Price,
            'Image'=>$imageName,
            'Describe'=>$Describe,
            'Hide'=>$Hide,
            'Hot'=>$Hot,
            'Quantity'=>$Quantity,
            'Id_Category'=>$Id_Category,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return $query_builder;
    }
    public function Product_GetById($id){
        $query_builder = product::where('Id_Product', $id)
        ->first();
        return $query_builder;
    }  
    public function deleteOldImage($imageName)
    {
        if (file_exists(public_path('uploads/products') . '/' . $imageName)) {
            unlink(public_path('uploads/products') . '/' . $imageName);
        }
    }
    public function Product_Update($Name, $Price, $imageName, $Describe, $Hide, $Hot, $Quantity, $Id_Category, $id){
        $query_builder = product::where('Id_Product', $id)
        ->update([
            'Name'=>$Name,
            'Price'=>$Price,
            'Image'=>$imageName,
            'Describe'=>$Describe,
            'Hide'=>$Hide,
            'Hot'=>$Hot,
            'Quantity'=>$Quantity,
            'Id_Category'=>$Id_Category,
            'updated_at'=>now(),
        ]);
        return $query_builder;
    }
    public function Product_Delete($id){
        $query_builder = product::where('Id_Product', $id)
        ->delete();
        return $query_builder;
    }
    public function Product_RanDom4(){
        $query_builder = product::inRandomOrder()
        ->limit(4)
        ->get();
        return $query_builder;
    }
    public function Product_GetHome($limit,$desc_asc){
        $query_builder = product::limit($limit)
        ->orderBy('Id_Product',$desc_asc)
        ->get();
        return $query_builder;
    }
    public function Product_GetByIdDm($id,$page,$filter=1,$keyword = null){
        $query_builder = product::where('Id_Category','=',$id);
        // Nếu có từ khóa tìm kiếm, thêm điều kiện tìm kiếm vào query
        if (!empty($keyword)) {
            $query_builder->where('Name', 'like', '%' . $keyword . '%');
        }
         // Sắp xếp theo thứ tự giá
        if ($filter == 1) {
            $query_builder->orderBy('Price', 'desc');
        } elseif ($filter == 2) {
            $query_builder->orderBy('Price', 'asc');
        }
        $products = $query_builder->paginate($page);
        return $products;
    }
        public function Product_Comment(){
            $query_builder = product::join('comment', 'product.Id_Product', '=', 'comment.Id_Product')
                ->select('product.*', DB::raw('COUNT(comment.Id_Product) as so_luong'))
                ->groupBy('product.Id_Product');
            return $query_builder->paginate(8);
        }
}
