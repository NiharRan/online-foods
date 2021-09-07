<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['brand', 'product_type'])
            ->select('products.*')
            ->join('stocks', 'stocks.product_id', '=', 'products.id', 'inner')
            ->where('stocks.quantity', '>', 0)
            ->where('products.status', 1)
            ->orderBy('products.id', 'DESC');
        if ($request->has('category') && $request->get('category') != '') {
            $products = $products->where('products.product_type_id', $request->get('category'));
        }

        if ($request->has('brands') && $request->get('brands') != '') {
            $brands = explode(',', $request->get('brands'));
            $products = $products->whereIn('brand_id', $brands);
        }

        if ($request->has('price_limit') && $request->get('price_limit') != '') {
            $price_limit = explode(',', $request->get('price_limit'));
            if ($price_limit[0] != 0 && $price_limit[1] != 0) {
                if ($price_limit[0] == 0 && $price_limit[1] != 0) {
                    $products = $products->where('products.price', '>=', $price_limit[1]);
                } else if ($price_limit[0] != 0 && $price_limit[1] == 0) {
                    $products = $products->where('products.price', '<=', $price_limit[1]);
                } else {
                    $products = $products->whereBetween('price', $price_limit);
                }
            }
        }

        if ($request->has('query') && $request->get('query') != '') {
            $products = $products->where('products.title', 'LIKE', $request->get('query'));
        }
        $products = $products->paginate(10);
        $jsonData = ProductResource::collection($products);
        return response()->json($jsonData->resource);
    }
}