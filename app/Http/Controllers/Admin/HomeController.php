<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Dashboard - Fashion Shop";
        $viewData["subtitle"] = "Thống kê";
        return view('admin.home.index', compact('viewData'));
    }
}
