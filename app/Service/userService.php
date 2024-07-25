<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userService
{
    public function register($FullName,$Email,$Password,$Avatar){
        $query_builder = User::create([
            'FullName'=>$FullName,
            'Email'=>$Email,
            'Password'=>$Password,
            'Avatar'=>$Avatar,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        return $query_builder;
    }
    public function login($Email,$Password){
        $user = User::where('Email', $Email)->first();
        if ($user && Hash::check($Password, $user->Password)) {
            Auth::login($user); // Đăng nhập người dùng vào hệ thống
            return true; // Xác thực thành công
        } else {
            return false; // Xác thực thất bại
        }
    }
    public function User_GetById($id){
        $query_builder = User::where('Id_User','=',$id)->first();
        return $query_builder;
    }
    public function User_UpdateAcount($FullName,$Phone,$Address,$Avatar,$id){
        $query_builder = User::where('Id_User','=',$id)
        ->update([
            'FullName'=>$FullName,
            'Phone'=>$Phone,
            'Address'=>$Address,
            'Avatar'=>$Avatar,
            'updated_at'=>now(),
        ]);
        return $query_builder;
    }
    public function deleteOldImage($imageName)
    {
        if (file_exists(public_path('uploads/users') . '/' . $imageName)) {
            unlink(public_path('uploads/users') . '/' . $imageName);
        }
    }
    public function saveImage($request)
    {
        $image = $request->file('Avatar');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/users'), $imageName);
        return $imageName;
    }
    public function User_GetAll(){
        $query_builder = User::paginate(8);
        return $query_builder;
    }
    public function User_Create($FullName,$Email,$Password,$Phone,$Address,$Role,$Avatar){
        $query_builder = User::create([
            'FullName'=>$FullName,
            'Email'=>$Email,
            'Password'=>$Password,
            'Phone'=>$Phone,
            'Address'=>$Address,
            'Role'=>$Role,
            'Avatar'=>$Avatar,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return $query_builder;
    }
    public function User_Update($Role,$id){
        $query_builder = User::where('Id_User','=',$id)
        ->update([
            'Role'=>$Role,
            'updated_at'=>now(),
        ]);
        return $query_builder;
    }
}
