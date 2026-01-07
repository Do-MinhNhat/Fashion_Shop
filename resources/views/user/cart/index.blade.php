<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng - MUSE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        body {
            font-family: "Inter", sans-serif;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        serif: ['"Playfair Display"', 'serif'],
                        sans: ['"Lato"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="text-gray-900 bg-white">
    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <button class="lg:hidden"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button>
            <!-- Logo -->
            <a href="/Client/index.html" class="text-3xl font-serif font-bold tracking-widest uppercase">CDHN.</a>

            <!-- Category -->
            <div class="hidden lg:flex space-x-8 text-sm uppercase tracking-wid之est font-bold text-gray-500">
                <a href="/Client/Product/ProductList.html" class="hover:text-black transition-colors">Nam</a>
                <a href="/Client/Product/ProductList.html" class="hover:text-black transition-colors">Nữ</a>
                <a href="/Client/Product/ProductList.html" class="hover:text-black transition-colors">Giày</a>
                <a href="/Client/Product/ProductList.html" class="hover:text-black transition-colors">Bộ sưu tập</a>
                <a href="/Client/Product/ProductList.html" class="hover:text-black transition-colors text-red-500">Sale</a>
            </div>

            <div class="flex space-x-6 items-center">
                <!-- Search -->
                <div class="relative flex items-center" id="search-container">  
                    <input type="text" 
                        id="search-input"
                        placeholder="Tìm kiếm sản phẩm..." 
                        class="w-0 opacity-0 border-b border-black bg-transparent outline-none text-sm transition-all duration-500 ease-in-out pr-8 py-2 absolute right-0 focus:w-64 focus:opacity-100 z-0 placeholder-gray-400"
                    >
                    <button id="search-btn" class="z-10 hover:scale-110 transition-transform pl-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                    <button id="close-search-btn" class="hidden absolute right-0 z-20 text-xs uppercase font-bold hover:text-red-500">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Account -->
                <button class="hover:scale-110 transition-transform">
                    <a href="/Client/Profile/Profile.html" class="hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </a>
                </button>

                <!-- Cart -->
                <div class="relative group cursor-pointer">
                    <button class="hover:scale-110 transition-transform">
                        <a href="/Client/Cart/Cart.html" class="hover:text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </a>
                    </button>
                    <span class="absolute -top-2 -right-2 bg-black text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center">2</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="pt-24 pb-20 max-w-7xl mx-auto px-6">
        <div class="text-center mb-16 animate-fade-in-up">
            <h1 class="text-4xl font-serif font-bold mb-2">Giỏ hàng của bạn</h1>
            <p class="text-gray-500 text-sm tracking-wide">2 sản phẩm trong túi</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-12 lg:gap-20">
            <!-- Cart Items -->
            <div class="w-full lg:w-2/3 space-y-8">
                <div class="hidden md:flex border-b border-gray-200 pb-4 text-xs uppercase tracking-widest text-gray-400 font-bold">
                    <div class="w-1/2">Sản phẩm</div>
                    <div class="w-1/4 text-center">Số lượng</div>
                    <div class="w-1/4 text-right">Tổng</div>
                </div>

                <!-- Product Item -->
                <div class="flex flex-col md:flex-row items-center gap-6 border-b border-gray-100 pb-8 group">
                    <div class="w-full md:w-auto flex justify-center">
                        <input type="checkbox" name="">
                    </div>

                    <div class="w-full md:w-24 aspect-[3/4] overflow-hidden bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=300" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                    </div>
                    
                    <div class="flex-1 text-center md:text-left w-full">
                        <div class="flex justify-between items-start">
                            <a href="product-detail.html" class="font-serif text-xl font-medium hover:underline underline-offset-4">Silk Elegance Dress</a>
                            <button class="text-gray-300 hover:text-red-500 transition md:hidden"><i class="fas fa-times"></i></button> </div>
                        <p class="text-sm text-gray-500 mt-1">Đen / Size M</p>
                        <p class="text-sm font-bold mt-2 md:hidden">1.200.000 ₫</p>
                        <button class="text-xs text-gray-400 border-b border-gray-300 hover:text-red-500 hover:border-red-500 transition mt-3 pb-0.5 hidden md:inline-block">Xóa</button>
                    </div>

                    <div class="w-full md:w-auto flex justify-center">
                        <div class="flex items-center border border-gray-300 px-2 py-1">
                            <button class="w-8 h-8 text-gray-500 hover:text-black hover:bg-gray-100 transition">-</button>
                            <input type="text" value="1" class="w-8 text-center border-none focus:ring-0 text-sm font-bold bg-transparent">
                            <button class="w-8 h-8 text-gray-500 hover:text-black hover:bg-gray-100 transition">+</button>
                        </div>
                    </div>

                    <div class="hidden md:block w-24 text-right font-medium">
                        1.200.000 ₫
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center gap-6 border-b border-gray-100 pb-8 group">
                    <div class="w-full md:w-auto flex justify-center">
                        <input type="checkbox" name="">
                    </div>
                    <div class="w-full md:w-24 aspect-[3/4] overflow-hidden bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1539008835657-9e8e9680c956?q=80&w=300" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                    </div>
                    <div class="flex-1 text-center md:text-left w-full">
                        <div class="flex justify-between items-start">
                            <a href="product-detail.html" class="font-serif text-xl font-medium hover:underline underline-offset-4">Velvet Blazer</a>
                            <button class="text-gray-300 hover:text-red-500 transition md:hidden"><i class="fas fa-times"></i></button>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Xanh Navy / Size L</p>
                        <p class="text-sm font-bold mt-2 md:hidden">2.500.000 ₫</p>
                        <button class="text-xs text-gray-400 border-b border-gray-300 hover:text-red-500 hover:border-red-500 transition mt-3 pb-0.5 hidden md:inline-block">Xóa</button>
                    </div>
                    <div class="w-full md:w-auto flex justify-center">
                        <div class="flex items-center border border-gray-300 px-2 py-1">
                            <button class="w-8 h-8 text-gray-500 hover:text-black hover:bg-gray-100 transition">-</button>
                            <input type="text" value="1" class="w-8 text-center border-none focus:ring-0 text-sm font-bold bg-transparent">
                            <button class="w-8 h-8 text-gray-500 hover:text-black hover:bg-gray-100 transition">+</button>
                        </div>
                    </div>
                    <div class="hidden md:block w-24 text-right font-medium">
                        2.500.000 ₫
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center gap-6 border-b border-gray-100 pb-8 group">
                    <div class="w-full md:w-auto flex justify-center">
                        <input type="checkbox" name="">
                    </div>
                    <div class="w-full md:w-24 aspect-[3/4] overflow-hidden bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1539008835657-9e8e9680c956?q=80&w=300" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                    </div>
                    <div class="flex-1 text-center md:text-left w-full">
                        <div class="flex justify-between items-start">
                            <a href="product-detail.html" class="font-serif text-xl font-medium hover:underline underline-offset-4">Velvet Blazer</a>
                            <button class="text-gray-300 hover:text-red-500 transition md:hidden"><i class="fas fa-times"></i></button>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Xanh Navy / Size L</p>
                        <p class="text-sm font-bold mt-2 md:hidden">2.500.000 ₫</p>
                        <button class="text-xs text-gray-400 border-b border-gray-300 hover:text-red-500 hover:border-red-500 transition mt-3 pb-0.5 hidden md:inline-block">Xóa</button>
                    </div>
                    <div class="w-full md:w-auto flex justify-center">
                        <div class="flex items-center border border-gray-300 px-2 py-1">
                            <button class="w-8 h-8 text-gray-500 hover:text-black hover:bg-gray-100 transition">-</button>
                            <input type="text" value="1" class="w-8 text-center border-none focus:ring-0 text-sm font-bold bg-transparent">
                            <button class="w-8 h-8 text-gray-500 hover:text-black hover:bg-gray-100 transition">+</button>
                        </div>
                    </div>
                    <div class="hidden md:block w-24 text-right font-medium">
                        2.500.000 ₫
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center gap-6 border-b border-gray-100 pb-8 group">
                    <div class="w-full md:w-auto flex justify-center">
                        <input type="checkbox" name="">
                    </div>
                    <div class="w-full md:w-24 aspect-[3/4] overflow-hidden bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1539008835657-9e8e9680c956?q=80&w=300" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                    </div>
                    <div class="flex-1 text-center md:text-left w-full">
                        <div class="flex justify-between items-start">
                            <a href="product-detail.html" class="font-serif text-xl font-medium hover:underline underline-offset-4">Velvet Blazer</a>
                            <button class="text-gray-300 hover:text-red-500 transition md:hidden"><i class="fas fa-times"></i></button>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Xanh Navy / Size L</p>
                        <p class="text-sm font-bold mt-2 md:hidden">2.500.000 ₫</p>
                        <button class="text-xs text-gray-400 border-b border-gray-300 hover:text-red-500 hover:border-red-500 transition mt-3 pb-0.5 hidden md:inline-block">Xóa</button>
                    </div>
                    <div class="w-full md:w-auto flex justify-center">
                        <div class="flex items-center border border-gray-300 px-2 py-1">
                            <button class="w-8 h-8 text-gray-500 hover:text-black hover:bg-gray-100 transition">-</button>
                            <input type="text" value="1" class="w-8 text-center border-none focus:ring-0 text-sm font-bold bg-transparent">
                            <button class="w-8 h-8 text-gray-500 hover:text-black hover:bg-gray-100 transition">+</button>
                        </div>
                    </div>
                    <div class="hidden md:block w-24 text-right font-medium">
                        2.500.000 ₫
                    </div>
                </div>

                <!-- App Discount -->
                <div class="pt-6">
                    <details class="group cursor-pointer">
                        <summary class="flex items-center gap-2 text-sm font-bold uppercase tracking-wide hover:text-gray-600 transition list-none">
                            <i class="fas fa-tag"></i> Thêm ghi chú hoặc mã giảm giá
                        </summary>
                        <div class="mt-4 flex flex-col md:flex-row gap-4 animate-fade-in-down">
                            <input type="text" placeholder="Ghi chú cho đơn hàng..." class="flex-1 border border-gray-300 px-4 py-3 focus:border-black outline-none text-sm">
                            <div class="flex w-full md:w-1/3">
                                <input type="text" placeholder="Mã giảm giá" class="w-full border border-gray-300 px-4 py-3 border-r-0 focus:border-black outline-none text-sm">
                                <button class="bg-gray-100 px-4 text-xs font-bold uppercase hover:bg-gray-200">Áp dụng</button>
                            </div>
                        </div>
                    </details>
                </div>
            </div>

            <!-- Total Price -->
            <div class="w-full lg:w-1/3">
                <div class="bg-gray-50 p-8 lg:sticky lg:top-28">
                    <h3 class="font-serif text-2xl mb-6">Tổng đơn hàng</h3>
                    
                    <div class="space-y-4 border-b border-gray-200 pb-6 mb-6 text-sm">
                        <div class="flex justify-between text-gray-600">
                            <span>Tạm tính</span>
                            <span>3.700.000 ₫</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Giảm giá</span>
                            <span>- 0 ₫</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Vận chuyển</span>
                            <span class="text-xs italic">Tính khi thanh toán</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-end mb-8">
                        <span class="font-bold text-lg uppercase tracking-wide">Tổng cộng</span>
                        <span class="font-serif text-2xl font-bold">3.700.000 ₫</span>
                    </div>

                    <a href="/Client/Checkout/Checkout.html" class="block w-full bg-black text-white text-center py-4 uppercase tracking-[0.2em] text-xs font-bold hover:bg-gray-800 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Thanh toán ngay
                    </a>
                    
                    <div class="mt-6 text-center">
                        <p class="text-xs text-gray-400 mb-2">Chúng tôi chấp nhận:</p>
                        <div class="flex justify-center gap-3 text-2xl text-gray-300">
                            <i class="fab fa-cc-visa"></i>
                            <i class="fab fa-cc-mastercard"></i>
                            <i class="fab fa-apple-pay"></i>
                        </div>
                    </div>

                    <a href="/Client/Index.html" class="block text-center text-xs underline text-gray-500 mt-6 hover:text-black">
                        Tiếp tục mua sắm
                    </a>
                </div>
            </div>
        </div>

        <!-- Gợi ý sản phẩm -->
        <div class="mt-24 pt-16 border-t border-gray-100">
            <h3 class="text-2xl font-serif text-center mb-10">Có thể bạn sẽ thích</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden aspect-[3/4] mb-3 bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1550614000-4b9519e02a48?q=80&w=400" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <h4 class="font-serif text-sm group-hover:underline">Classic Trench Coat</h4>
                    <p class="text-gray-500 text-xs mt-1">3.200.000 ₫</p>
                </div>
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden aspect-[3/4] mb-3 bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1548624149-f32d93e2b20f?q=80&w=400" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <h4 class="font-serif text-sm group-hover:underline">Silk Scarf</h4>
                    <p class="text-gray-500 text-xs mt-1">450.000 ₫</p>
                </div>
            </div>
        </div>

    </div>
</body>
</html>