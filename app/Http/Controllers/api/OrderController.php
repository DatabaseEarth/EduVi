<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Service\cartService;

class OrderController extends Controller
{
    public $cartService;
    public function __construct()
    {
        $this->cartService = new cartService;
    }
    public function addToCard(Request $request){
        
    }
    //
}
