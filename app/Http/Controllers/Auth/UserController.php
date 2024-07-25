<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\account_update;
use App\Http\Requests\user_login;
use App\Http\Requests\user_register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Service\userService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $User;
    public $userService;
    public function __construct()
    {
        $this->User = new User;
        $this->userService = new userService;
    }
    public function login()
    {
        $title = 'Đăng nhập';
        return view('clients.login', compact('title'));
    }
    public function login_in(user_login $request){
        
        $kq = $this->userService->login($request->Email,$request->Password);
        // dd($kq);
        if ($kq==true) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }
    public function register_add(user_register $request){
        
        $Password = Hash::make($request->Password);
        $Avatar = 'main.png';
        $this->userService->register($request->FullName,$request->Email,$Password,$Avatar);
        return redirect()->route('login');
    }
    public function register()
    {
        $title = 'Đăng ký';
        return view('clients.register', compact('title'));
    }
    public function logout(){
        // Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }
    public function account(){
        $title = 'Tài khoản';
        $account = Auth::user();
        return view('clients.account',compact('title','account'));
    }
    public function account_update(account_update $request){
        // nếu ko có ảnh mới thì nới cũ :))
        $imageName = Auth::user()->Avatar;
        // Kiểm tra và xóa file ảnh cũ
        if ($request->hasFile('Avatar') && $imageName !== 'main.png') {
            $this->userService->deleteOldImage($imageName);
        }
        // Xử lý lưu file ảnh
        if ($request->hasFile('Avatar')){
            $imageName = $this->userService->saveImage($request);
        }
        // dd($imageName);
        $this->userService->User_UpdateAcount($request->FullName,$request->Phone,$request->Address,$imageName,Auth::user()->Id_User);
        return redirect()->back();
    }
}
