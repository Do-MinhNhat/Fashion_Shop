<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $viewData = [];
        $viewData["title"] = "Trang chủ - Fashion Shop";
        return view('user.home.index', compact('viewData'));
    }
}
