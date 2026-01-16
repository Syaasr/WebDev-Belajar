<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::latest();

        if ($request->has('category_id')) {
            $products->where('category_id', $request->category_id);
        }

        $products = $products->take(8)->get();
        $categories = Category::all();
        
        return view('home', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $product->increment('clicks');
        return view('products.show', compact('product'));
    }
}