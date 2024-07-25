<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Service\productService;
use App\Service\courseService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public $productService;
    public $courseService;
    public function __construct()
    {
        $this->productService = new productService;
        $this->courseService = new courseService;
    }
    public function index()
    {
        $title = 'Trang chủ';
        $homeProduct = $this->productService->Product_GetHome(4,'desc');
        if (Auth::check()) {
            $user = Auth::user()->Id_User;
        } else {
            $user = 0;
        }
        
        $course_pro = $this->courseService->Course_GetPro($user,'desc',4);
        return view('clients.home', compact('title','homeProduct','course_pro'));
    }
    public function contact()
    {
        $title = 'Liên hệ';
        return view('clients.contact', compact('title'));
    }
}
