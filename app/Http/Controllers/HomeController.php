<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // User Profile
    public function index(Request $request)
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $products = Product::with(['brand', 'product_type'])
            ->select('products.*')
            ->join('stocks', 'stocks.product_id', '=', 'products.id', 'inner')
            ->where('stocks.quantity', '>', 0)
            ->where('products.status', 1)
            ->orderBy('products.id', 'DESC')->paginate(5);

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],
        ];

        $user = User::with('shipping_address')->find(Auth::id());

        return view('/frontend/home', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'products' => $products,
        ]);
    }
}
