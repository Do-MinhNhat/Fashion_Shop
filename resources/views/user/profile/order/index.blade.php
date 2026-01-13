@extends('user.layouts.app')
@section('title', $viewData['title'])

@section('content')

<div class="max-w-6xl mx-auto pt-20 pb-10 px-4 flex flex-col md:flex-row gap-8 bg-gray-50  text-gray-800">
    <!-- Sidebar -->
    @include('components.sidebar.profile-sidebar')

    <main class="flex-1 bg-white p-8 shadow-sm">
        <h2 class="text-xl font-serif font-bold mb-6">Đơn hàng của tôi</h2>
        
        <div class="space-y-6">
            <div class="border border-gray-100 rounded-lg p-6 hover:shadow-md transition">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="font-bold text-lg">#ORD-8823</span>
                        <p class="text-xs text-gray-400">Đặt ngày: 15/05/2026</p>
                    </div>
                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-bold">Đang giao hàng</span>
                </div>
                <div class="flex gap-4 border-t border-b border-gray-50 py-4 mb-4">
                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=100" class="w-16 h-20 object-cover bg-gray-100 rounded">
                    <img src="https://images.unsplash.com/photo-1539008835657-9e8e9680c956?q=80&w=100" class="w-16 h-20 object-cover bg-gray-100 rounded">
                    <div class="flex items-center text-gray-400 text-sm ml-2">+2 sản phẩm khác</div>
                </div>
                <div class="flex justify-between items-center">
                    <p class="text-sm font-medium">Tổng tiền: <span class="text-lg font-bold">4.200.000 ₫</span></p>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 text-xs border border-gray-300 hover:bg-gray-50">Chi tiết</button>
                        <button class="px-4 py-2 text-xs bg-black text-white hover:bg-gray-800">Mua lại</button>
                    </div>
                </div>
            </div>
            
            <div class="border border-gray-100 rounded-lg p-6 opacity-75">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="font-bold text-lg">#ORD-1029</span>
                        <p class="text-xs text-gray-400">Đặt ngày: 01/02/2026</p>
                    </div>
                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-bold">Đã giao</span>
                </div>
                <div class="flex gap-4 border-t border-b border-gray-50 py-4 mb-4">
                    <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=100" class="w-16 h-20 object-cover bg-gray-100 rounded">
                </div>
                <div class="flex justify-between items-center">
                    <p class="text-sm font-medium">Tổng tiền: <span class="text-lg font-bold">850.000 ₫</span></p>
                    <button class="px-4 py-2 text-xs border border-gray-300 hover:bg-gray-50">Đánh giá</button>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection