<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;  
use App\Models\Category; 

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalClicks = Product::sum('clicks');

        return view('dashboard', compact('totalProducts', 'totalCategories', 'totalClicks'));
    }
}