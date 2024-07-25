<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\user_post;
use App\Http\Requests\user_put;
use Illuminate\Http\Request;

use App\Service\userService;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public $userService;
    public function __construct()
    {
        $this->userService = new userService;
        
    }
    public function user()
    {
        $title = 'Tài khoản';
        $user_list = $this->userService->User_GetAll();
        return view('admin.user', compact('title','user_list'));
    }
    public function user_add()
    {
        $title = 'Thêm tài khoản';
        return view('admin.user_add', compact('title'));
    }
    public function user_create(user_post $request){
        $Password = Hash::make($request->Password);
        $imageName = 'main.png';
        // Xử lý lưu file ảnh
        if ($request->hasFile('Avatar')){
            $imageName = $this->userService->saveImage($request);
        }
        $this->userService->User_Create($request->FullName,$request->Email,$Password,$request->Phone,$request->Address,$request->Role,$imageName);
        return redirect()->route('admin.user.read');
    }
    public function user_edit($id)
    {
        $title = 'Sửa tài khoản';
        $user = $this->userService->User_GetById($id);
        return view('admin.user_edit', compact('title','user'));
    }
    public function user_update(Request $request, $id){
        $this->userService->User_Update($request->Role,$id);
        return redirect()->route('admin.user.read');
    }
}
