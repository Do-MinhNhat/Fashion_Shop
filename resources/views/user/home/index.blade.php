@extends('layouts.app')
    @section('head')
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
    @endsection
     @section('content')
    <div class="text-art-black antialiased bg-white selection:bg-black selection:text-white">
       
        
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
          @endsection  
        <!-- Footer -->
        @section('script')
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
        @endsection('script')
        </div>
