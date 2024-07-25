<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function dashboard()
    {
        $data = [
            'title' => 'Thống kê'
        ];
        return view('admin.dashboard', $data);
    }
}
