<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\category_post;
use App\Http\Requests\category_put;
use Illuminate\Http\Request;


use App\Service\categoryService;

class CategoryController extends Controller
{
    public $categoryService;
    public function __construct()
    {
        $this->categoryService = new categoryService;
    }
    public function category()
    {
        $title = 'Danh mục';
        $categories = $this->categoryService->GetCategory_Admin();
        return view('admin.category', compact('title','categories'));
    }
    public function category_add()
    {
        $title = 'Danh mục';
        return view('admin.category_add', compact('title'));
    }
    public function category_create(category_post $request)
    {
        // Xử lý lưu file ảnh
        $imageName = $this->categoryService->saveImage($request);
        
        $kq = $this->categoryService->Category_Add($request->Name, $request->Hide, $request->Describe, $imageName);
        if ($kq) {
            # code...
            return redirect()->route('admin.category.read');
        }else{
            echo 'Bug tới Bug tới!';
        }
    }
    public function category_edit($id)
    {
        $title = 'Sửa danh muc';
        $data_category = $this->categoryService->Category_GetById($id);
        // dd($data_category->Image);
        return view('admin.category_edit', compact('title','data_category'));
    }
    public function category_update(category_put $request,$id)
    {
        // nếu ko có ảnh mới thì nới cũ :))
        $data_category = $this->categoryService->Category_GetById($id);
        $imageName = $data_category->Image;
        // Kiểm tra và xóa file ảnh cũ
        if ($request->hasFile('Image') && $imageName) {
            $this->categoryService->deleteOldImage($imageName);
        }
        // Xử lý lưu file ảnh
        if ($request->hasFile('Image')){
            $imageName = $this->categoryService->saveImage($request);
        }
        $kq = $this->categoryService->Category_Update($request->Name, $request->Hide, $request->Describe, $imageName,$id);
        if ($kq) {
            return redirect()->route('admin.category.read');
        }else{
            echo 'Bug tới Bug tới!';
        }
    }
    public function category_delete($id){
        $data_category = $this->categoryService->Category_GetById($id);
        $imageName = $data_category->Image;
        // Kiểm tra và xóa file ảnh cũ
        if ($imageName) {
            $this->categoryService->deleteOldImage($imageName);
        }
        $this->categoryService->Category_Delete($id);
        return redirect()->route('admin.category.read');
    }
    
    
}