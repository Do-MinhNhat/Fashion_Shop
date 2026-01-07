@extends('layouts.app')
@section('head')
<div>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm - CDHN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { serif: ['"Playfair Display"', 'serif'], sans: ['"Lato"', 'sans-serif'] } } }
        }
    </script>
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        body {
            font-family: "Inter", sans-serif;
        }
    </style>
</div>
@endsection
@section('content')
<div class=" text-gray-900 bg-white">
    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur border-b border-gray-100 px-6 py-4 flex justify-between items-center">
        <a href="/Client/index.html" class="text-2xl font-serif font-bold tracking-widest uppercase">CDHN.</a>
        <div class="flex gap-4">
            <button class="hover:scale-110 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
            <button class="hover:scale-110 transition-transform">
                <a href="Profile/Profile.html">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </a>
            </button>
            <button class="hover:scale-110 transition-transform">
                <a href="/Client/Cart/Cart.html" class="hover:text-gray-600"><i class="fas fa-shopping-bag"></i></a>
            </button>
        </div>
    </nav>

    <div class="pt-20 lg:pt-28 max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row lg:h-screen lg:overflow-hidden">
            <!-- Image -->
            <div class="w-full lg:w-3/5 lg:h-full relative bg-gray-100">
                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000" class="absolute inset-0 w-full h-auto object-cover">
                <div class="absolute bottom-6 left-6 right-6">
                    <div class="grid grid-cols-4 gap-4 max-w-[300px]">
                        <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=200" class="w-full aspect-[3/4] object-cover border-2 border-white/50 hover:border-white cursor-pointer transition">
                        <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=200" class="w-full aspect-[3/4] object-cover border-2 border-white/50 hover:border-white cursor-pointer transition">
                        <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=200" class="w-full aspect-[3/4] object-cover border-2 border-white/50 hover:border-white cursor-pointer transition">
                        <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=200" class="w-full aspect-[3/4] object-cover border-2 border-white/50 hover:border-white cursor-pointer transition">
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="w-full lg:w-2/5 h-full bg-white px-6 py-6 lg:px-12 lg:py-12">
                <div class="max-w-md mx-auto"> <span class="text-sm text-gray-400 tracking-widest uppercase">Collection 2024</span>
                    <h1 class="text-4xl font-serif mt-2 mb-4">Silk Elegance Dress</h1>
                    <p class="text-2xl font-light mb-6">1.200.000 ₫</p>
                    
                    <p class="text-gray-500 text-sm leading-relaxed mb-8">
                        Thiết kế lụa tơ tằm cao cấp với đường cắt may thủ công tinh xảo. Một sự lựa chọn hoàn hảo cho những buổi tiệc tối sang trọng, tôn lên vẻ đẹp thanh lịch và bí ẩn.
                    </p>

                    <div class="mb-6">
                        <label class="text-xs uppercase font-bold tracking-wide block mb-2">Màu sắc</label>
                        <div class="flex gap-3">
                            <button class="w-8 h-8 rounded-full bg-black border-2 border-gray-300 ring-2 ring-offset-2 ring-black focus:outline-none"></button>
                            <button class="w-8 h-8 rounded-full bg-red-800 border-2 border-transparent hover:border-gray-300 transition"></button>
                            <button class="w-8 h-8 rounded-full bg-beige-200 border-2 border-gray-200" style="background-color: #f5f5dc;"></button>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="text-xs uppercase font-bold tracking-wide block mb-2">Kích cỡ</label>
                        <div class="flex gap-3">
                            <button class="w-10 h-10 border border-gray-300 flex items-center justify-center hover:bg-black hover:text-white transition text-sm">S</button>
                            <button class="w-10 h-10 border border-black bg-black text-white flex items-center justify-center text-sm">M</button>
                            <button class="w-10 h-10 border border-gray-300 flex items-center justify-center hover:bg-black hover:text-white transition text-sm">L</button>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex border border-gray-300 w-32 items-center">
                            <button class="w-10 h-12 hover:bg-gray-100">-</button>
                            <input type="text" value="1" class="w-full text-center border-none focus:ring-0 h-full">
                            <button class="w-10 h-12 hover:bg-gray-100">+</button>
                        </div>
                        <button class="flex-1 bg-black text-white uppercase tracking-widest text-xs font-bold hover:bg-gray-800 transition py-4">
                            Thêm vào giỏ
                        </button>
                        <button class="w-12 border border-gray-300 flex items-center justify-center hover:text-red-500 transition">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>

                    <div class="mt-10 border-t border-gray-200">
                        <div class="py-10">
                            <h3 class="font-bold text-sm uppercase mb-4">
                                Giao hàng & Đổi trả <span class="transition group-open:rotate-180"><i class="fas fa-chevron-down"></i></span>
                            </h3>
                            <p class="text-gray-500 text-sm mt-3">Miễn phí giao hàng cho đơn trên 2 triệu. Đổi trả trong 7 ngày.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Reviews -->
        <div class="py-20 border-t border-gray-100">
            <h3 class="text-2xl font-serif mb-6">Đánh giá khách hàng (2)</h3>
            <div></div>
        </div>
    </div>
@endsection