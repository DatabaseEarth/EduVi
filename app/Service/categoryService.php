<?php

namespace App\Service;


use App\Models\category;

class categoryService{
    public function Category_GetAll(){
        $query_builder = category::orderBy('Id_Category','asc')
        ->get();
        return $query_builder;
    }
    
    public function GetCategory_Admin(){
        $query_builder = category::where('Hide','=',1)
        ->orderBy('Id_Category','desc')
        ->paginate(8);
        return $query_builder;
    }
    public function Category_Add($Name,$Hide,$Describe,$Image){
        return category::create([
            'Name' => $Name,
            'Hide' => $Hide, 
            'Describe' => $Describe,
            'Image' => $Image,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
    public function Category_GetById($id){
        $query_builder = category::where('Id_Category', $id)->first();
        return $query_builder;
    }
    public function deleteOldImage($imageName)
    {
        if (file_exists(public_path('uploads/categories') . '/' . $imageName)) {
            unlink(public_path('uploads/categories') . '/' . $imageName);
        }
    }
    public function saveImage($request)
    {
        $image = $request->file('Image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/categories'), $imageName);
        return $imageName;
    }
    public function Category_Update($Name,$Hide,$Describe,$Image,$id){
        // dd($Name,$Hide,$Describe,$Image,$id);
        $query_builder = category::where('Id_Category', $id)
        ->update([
            'Name' => $Name,
            'Hide' => $Hide, 
            'Describe' => $Describe,
            'Image' => $Image,
            'updated_at'=>now()
        ]);
        // dd($query_builder);
        return $query_builder;
    }
    public function Category_Delete($id){
        $query_builder = category::where('Id_Category', $id)
        ->delete();
        return $query_builder;
    }
}
    