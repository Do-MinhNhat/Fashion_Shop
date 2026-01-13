<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $viewData['title'] = 'Sổ Địa Chỉ - Fasion Shop';
        $user = Auth::user();
        return view('user.profile.address.index', compact('user', 'viewData'));
    }

    /**
     * Cập nhật địa chỉ
     */
    public function update(Request $request)
    {
        //
    }
}
