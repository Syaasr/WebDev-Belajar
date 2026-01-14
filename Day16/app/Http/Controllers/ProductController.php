<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::with('category')->paginate(10);
        // return view('products.index', compact('products'));

        $products = \App\Models\Product::all();
        return view('admin.products.index', compact('products'));
    }
}
