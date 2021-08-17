<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // User Profile
     public function show(){
        $pageConfigs = [
          'sidebarCollapsed' => true
      ];

      $breadcrumbs = [
          ['link'=>"dashboard-analytics",'name'=>"Home"], ['link'=>"dashboard-analytics",'name'=>"Pages"], ['name'=>"Profile"]
      ];

      return view('/pages/profile', [
          'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs
      ]);
    }
}
