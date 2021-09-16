<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $orders = Order::with(['user'])->orderBy('id', 'DESC')->paginate(10);

        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/orders", 'name' => "Orders"]
        ];

        return view('/orders/index', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'orders' => $orders,
        ]);
    }
}
