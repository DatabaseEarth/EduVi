<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Service\commentService;
class CommentController extends Controller
{
    public $commentService;
    public function __construct()
    {
        $this->commentService = new commentService;
    }
    public function comment_product(Request $request,$id){
        if (Auth::check()) {
            $this->commentService->Comment_Add($id,$request->comment,Auth::user()->Id_User);
            return redirect()->back();
        }else{
            return redirect()->route('login');
        }
    }
    
}
