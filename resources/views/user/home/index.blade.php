<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CDHN - Fashion</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            'art-black': '#1a1a1a',
                            'art-gray': '#f4f4f4',
                        }
                    }
                }
            }
        </script>
        <style>
            .no-scrollbar::-webkit-scrollbar { display: none; }
            .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

            body {
                font-family: "Inter", sans-serif;
            }
        </style>
    </head>

    <body class="text-art-black antialiased bg-white selection:bg-black selection:text-white">
        <!-- Navbar -->
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
                        <a href="Profile/Profile.html">
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

        <!-- Slideshow -->
        <header>
            <section class="relative h-screen flex items-center justify-center overflow-hidden bg-gray-900">
                <div id="hero-slider" class="absolute inset-0 w-full h-full">
                    <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=2070&auto=format&fit=crop"
                        class="slider-img absolute inset-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000 ease-in-out"
                        alt="Slide 1">

                    <img src="https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=2070&auto=format&fit=crop"
                        class="slider-img absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000 ease-in-out"
                        alt="Slide 2">

                    <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=2070&auto=format&fit=crop"
                        class="slider-img absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000 ease-in-out"
                        alt="Slide 3">

                    <div class="absolute inset-0 bg-black/20 z-10"></div>
                </div>

                <div class="relative z-20 text-center text-white px-4 animate-fade-in-up">
                    <h2 class="text-sm md:text-base uppercase tracking-[0.5em] mb-4 drop-shadow-md">Bộ sưu tập Xuân Hè 2026</h2>
                    <h1 class="text-5xl md:text-8xl font-serif font-bold mb-8 drop-shadow-lg">The Art of Silence</h1>
                    <a href="/Client/Product/ProductList.html" class="inline-block border border-white px-10 py-4 text-sm uppercase tracking-widest hover:bg-white hover:text-black transition-all duration-500 backdrop-blur-sm bg-white/10">
                        Khám phá ngay <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </section>
        </header>

        <!-- Content -->
        <main class="max-w-7xl mx-auto">
            <!-- Sản phẩm mới -->
            <section class="px-6 py-12 mt-6">
                <!-- Title -->
                <div class="flex flex-col md:flex-row justify-between items-end mb-10 border-b border-gray-200 pb-4">
                    <h3 class="text-3xl font-serif">Sản phẩm mới</h3>

                    <div class="flex space-x-4 mt-4 md:mt-0 text-sm">
                        <a href="" class="hover:underline">View All</a>
                    </div>
                </div>
                <!-- Product List -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-8 gap-y-12">
                    <!-- Product Card -->
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1539008835657-9e8e9680c956?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Velvet Blazer</h4>
                                <p class="text-gray-500 text-sm mt-1">2.500.000 ₫</p>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Sản Phẩm Nổi Bật -->
            <section class="px-6 py-12">
                <!-- Title -->
                <div class="flex flex-col md:flex-row justify-between items-end mb-10 border-b border-gray-200 pb-4">
                    <h3 class="text-3xl font-serif">Sản Phẩm Nổi Bật</h3>

                    <div class="flex space-x-4 mt-4 md:mt-0 text-sm">
                        <a href="" class="hover:underline">View All </a>
                    </div>
                </div>
                <!-- Product List -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-8 gap-y-12">
                    <!-- Product Card -->
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Bộ sưu tập -->
            <section class="px-6 py-12">
                <!-- Title -->
                <div class="flex flex-col md:flex-row justify-between items-end mb-10 border-b border-gray-200 pb-4">
                    <h3 class="text-3xl font-serif">Bộ sưu tập hot</h3>

                    <div class="flex space-x-4 mt-4 md:mt-0 text-sm">
                        <a href="" class="hover:underline">View All </a>
                    </div>
                </div>
                <!-- Product List -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-8 gap-y-12">
                    <!-- Product Card -->
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Best seller -->
            <section class="px-6 py-12">
                <!-- Title -->
                <div class="flex flex-col md:flex-row justify-between items-end mb-10 border-b border-gray-200 pb-4">
                    <h3 class="text-3xl font-serif">Sản phẩm bán chạy</h3>

                    <div class="flex space-x-4 mt-4 md:mt-0 text-sm">
                        <a href="" class="hover:underline">View All </a>
                    </div>
                </div>
                <!-- Product List -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-8 gap-y-12">
                    <!-- Product Card -->
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="group cursor-pointer">
                        <a href="Product/ProductDetail.html">
                            <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Product">
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/90 backdrop-blur">
                                    <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">Thêm vào giỏ</button>
                                </div>
                                <div class="absolute top-4 left-4 bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold">New</div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4">Silk Elegance Dress</h4>
                                <p class="text-gray-500 text-sm mt-1">1.200.000 ₫</p>
                                <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                                    <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-100 pt-16 pb-8">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 border-t border-gray-100 pt-12">

                    <div class="space-y-4">
                        <a href="#" class="text-2xl font-serif font-bold tracking-widest uppercase block">CDHN.</a>
                        <p class="text-xs text-gray-500 leading-6">
                            Vietnam Office<br>
                            65 Huynh Thuc Khang Street, District 1<br>
                            Ho Chi Minh City, Vietnam
                        </p>
                        <p class="text-xs text-gray-500">contact@CDHNfashion.vn</p>
                        <p class="text-xs text-gray-500">+84 123 456 789</p>

                        <div class="flex space-x-4 pt-2">
                            <a href="#" class="text-gray-400 hover:text-black transition transform hover:-translate-y-1"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-gray-400 hover:text-black transition transform hover:-translate-y-1"><i class="fab fa-github"></i></a>
                            <a href="#" class="text-gray-400 hover:text-black transition transform hover:-translate-y-1"><i class="fab fa-google"></i></a>
                        </div>
                    </div>

                    <div>
                        <h4 class="font-bold text-xs uppercase tracking-widest mb-6">Cửa hàng</h4>
                        <ul class="space-y-3 text-sm text-gray-500">
                            <li><a href="#" class="hover:text-black hover:underline underline-offset-4 transition">Thời trang Nữ</a></li>
                            <li><a href="#" class="hover:text-black hover:underline underline-offset-4 transition">Thời trang Nam</a></li>
                            <li><a href="#" class="hover:text-black hover:underline underline-offset-4 transition">Giày</a></li>
                            <li><a href="#" class="hover:text-black hover:underline underline-offset-4 transition">Bộ sưu tập mới</a></li>
                            <li><a href="#" class="hover:text-black hover:underline underline-offset-4 transition text-red-500">Sale Off</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-bold text-xs uppercase tracking-widest mb-6">Hỗ trợ</h4>
                        <ul class="space-y-3 text-sm text-gray-500">
                            <li><a href="#" class="hover:text-black hover:underline underline-offset-4 transition">Tra cứu đơn hàng</a></li>
                            <li><a href="#" class="hover:text-black hover:underline underline-offset-4 transition">Chính sách đổi trả</a></li>
                            <li><a href="#" class="hover:text-black hover:underline underline-offset-4 transition">Hướng dẫn chọn size</a></li>
                            <li><a href="#" class="hover:text-black hover:underline underline-offset-4 transition">Câu hỏi thường gặp (FAQ)</a></li>
                            <li><a href="#" class="hover:text-black hover:underline underline-offset-4 transition">Chăm sóc khách hàng</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-bold text-xs uppercase tracking-widest mb-6">Về CDHN</h4>
                        <ul class="space-y-3 text-sm text-gray-500">
                            <li><a href="#" class="hover:text-black hover:underline underline-offset-4 transition">Điều khoản dịch vụ</a></li>
                            <li><a href="#" class="hover:text-black hover:underline underline-offset-4 transition">Chính sách bảo mật</a></li>
                        </ul>
                    </div>
                </div>

                <div class="mt-16 pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-[10px] text-gray-400 uppercase tracking-wide">© 2026 CDHN Studio. All rights reserved.</p>

                    <div class="flex gap-4 text-gray-300 text-xl">
                        <i class="fab fa-cc-visa hover:text-gray-600 transition"></i>
                        <i class="fab fa-cc-mastercard hover:text-gray-600 transition"></i>
                        <i class="fab fa-cc-paypal hover:text-gray-600 transition"></i>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            const searchBtn = document.getElementById('search-btn');
            const searchInput = document.getElementById('search-input');
            const searchContainer = document.getElementById('search-container');
            let isSearchOpen = false;

            searchBtn.addEventListener('click', (e) => {
                if (!isSearchOpen) {
                    // MỞ SEARCH
                    e.preventDefault();

                    // 1. Mở rộng input
                    searchInput.classList.remove('w-0', 'opacity-0');
                    searchInput.classList.add('w-64', 'opacity-100', 'px-2');

                    // 2. Focus vào ô nhập liệu ngay lập tức
                    searchInput.focus();

                    isSearchOpen = true;
                } else {
                    if(searchInput.value.trim() !== "") {
                        console.log("Đang tìm kiếm: " + searchInput.value);
                    } else {
                        closeSearch();
                    }
                }
            });
            function closeSearch() {
                searchInput.classList.remove('w-64', 'opacity-100', 'px-2');
                searchInput.classList.add('w-0', 'opacity-0');
                isSearchOpen = false;
            }
            document.addEventListener('click', (e) => {
                if (!searchContainer.contains(e.target) && isSearchOpen) {
                    closeSearch();
                }
            });

            document.addEventListener("DOMContentLoaded", () => {
                const slides = document.querySelectorAll('.slider-img');
                let currentSlide = 0;
                const slideInterval = 5000;

                function nextSlide() {
                    // 1. Ẩn ảnh hiện tại
                    slides[currentSlide].classList.remove('opacity-100');
                    slides[currentSlide].classList.add('opacity-0');

                    // 2. Tăng chỉ số (nếu hết ảnh thì quay về 0)
                    currentSlide = (currentSlide + 1) % slides.length;

                    // 3. Hiện ảnh kế tiếp
                    slides[currentSlide].classList.remove('opacity-0');
                    slides[currentSlide].classList.add('opacity-100');
                }

                // Kích hoạt vòng lặp
                setInterval(nextSlide, slideInterval);
            });
        </script>
    </body>
</html>
