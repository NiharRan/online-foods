<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // User Profile
    public function index(Request $request)
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $breadcrumbs = [
            ['link' => "dashboard-analytics", 'name' => "Home"],
            ['link' => "dashboard-analytics", 'name' => "Pages"],
            ['name' => "Profile"]
        ];

        return view('/frontend/home', [
            'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs
        ]);
    }
}
