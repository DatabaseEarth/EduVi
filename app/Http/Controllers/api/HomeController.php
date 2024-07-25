<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

use App\Service\cartService;
use App\Service\productService;
use App\Service\categoryService;

class HomeController extends Controller
{
    public $cartService;
    public $productService;
    public $categoryService;
    public function __construct()
    {
        $this->cartService = new cartService;
        $this->productService = new productService;
        $this->categoryService = new categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Trang chủ';
        $product_home = $this->productService->Product_GetHome(4,'desc');
        $data = [
            'title' => $title,
            'products' => ProductResource::collection($product_home),
        ];
        // dd($data);
        return response()->json($data, 200);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
