<?php

namespace App\Service;


use App\Models\comment;

class commentService
{
    public function Comment_Add($id_product,$comment,$id_user){
        $query_builder = comment::create([
            'Content'=>$comment,
            'Id_User'=>$id_user,
            'Id_Product'=>$id_product,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return $query_builder;
    }
    public function Comment_ProductDetail($id){
        $query_builder = comment::with(['user', 'product'])
        ->where('Id_Product', $id)
        ->get();
        return $query_builder;
    }
    
}
