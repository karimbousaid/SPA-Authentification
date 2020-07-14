<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   /* public function __construct()
    {
        $this->middleware('auth');
    } */

    public function index()
    {
        $products = Product::all();
        return response()->json(['products' => $products]);
    }
}
