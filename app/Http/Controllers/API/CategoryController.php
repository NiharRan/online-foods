<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\ProductType;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = ProductType::orderBy('name', 'ASC')->get();
        return response()->json($categories);
    }
}
