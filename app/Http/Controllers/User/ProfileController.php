<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Trang hồ sơ cá nhân
     */
    public function index()
    {
        $viewData['title'] = 'Hồ sơ cá nhân - Fasion Shop';
        $user = Auth::user();
        return view('user.profile.index', compact('user', 'viewData'));
    }

    /**
     * Cập nhật thông tin cá nhân
     */
    public function update(Request $request)
    {
        
    }

    /**
     * Đổi mật khẩu
     */
    public function changePassword(Request $request)
    {
        
    }
}
