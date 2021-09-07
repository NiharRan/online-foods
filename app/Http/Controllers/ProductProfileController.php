<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductProfileController extends Controller
{
    // User Profile
    public function index(Request $request, $slug)
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $product = Product::with(['brand', 'product_type'])->where('slug', $slug)->first();

        $breadcrumbs = [
            ['link' => "dashboard-analytics", 'name' => "Home"],
            ['link' => "dashboard-analytics", 'name' => "Products"],
            ['name' => "Profile"]
        ];

        return view('/frontend/product', [
            'pageConfigs' => $pageConfigs, 
            'breadcrumbs' => $breadcrumbs,
            'product' => $product,
        ]);
    }
}
