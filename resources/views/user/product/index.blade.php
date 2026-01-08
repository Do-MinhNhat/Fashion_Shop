@extends('user.layouts.app')
@section('title', $viewData['title'])
@section('header', $viewData['header'])
@section('head-script')
<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    serif: ['"Playfair Display"', 'serif'],
                    sans: ['"Lato"', 'sans-serif']
                },
                colors: {
                    'art-black': '#1a1a1a'
                }
            }
        }
    }
</script>
@endsection
@section('style')
<style>
    /* Tùy chỉnh thanh cuộn cho đẹp hơn */
    details>summary {
        list-style: none;
    }

    details>summary::-webkit-details-marker {
        display: none;
    }

    .checkbox-artist:checked+div {
        background-color: black;
        border-color: black;
    }

    .checkbox-artist:checked+div svg {
        display: block;
    }

    body {
        font-family: "Inter", sans-serif;
    }
</style>
@endsection
@section('content')


<body class=" text-art-black bg-white">
@endsection()
    <div class="max-w-[1440px] mx-auto flex min-h-screen">
        <!-- Filter -->
        <aside class="w-72 hidden lg:block border-r border-gray-100 p-8 sticky top-[73px] h-[calc(100vh-73px)] overflow-y-auto custom-scrollbar">
            <div class="flex justify-between items-center mb-8">
                <h3 class="font-serif text-lg font-bold">Bộ lọc</h3>
                <button class="text-xs text-gray-400 underline hover:text-black">Xóa tất cả</button>
            </div>

            <!-- Category -->
            <div class="mb-8">
                <h4 class="text-xs font-bold uppercase tracking-widest mb-4 text-gray-500">Danh mục</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="block font-bold border-l-2 border-black pl-3">Tất cả sản phẩm</a></li>
                    <li><a href="#" class="block text-gray-600 hover:text-black hover:pl-2 transition-all pl-3 border-l-2 border-transparent">Áo khoác & Blazer</a></li>
                    <li><a href="#" class="block text-gray-600 hover:text-black hover:pl-2 transition-all pl-3 border-l-2 border-transparent">Váy đầm (Dresses)</a></li>
                    <li><a href="#" class="block text-gray-600 hover:text-black hover:pl-2 transition-all pl-3 border-l-2 border-transparent">Quần tây & Jeans</a></li>
                    <li><a href="#" class="block text-gray-600 hover:text-black hover:pl-2 transition-all pl-3 border-l-2 border-transparent">Phụ kiện</a></li>
                </ul>
            </div>

            <!-- Price -->
            <div class="mb-8 border-t border-gray-100 pt-6">
                <details open class="group">
                    <summary class="flex justify-between items-center cursor-pointer mb-4">
                        <span class="text-xs font-bold uppercase tracking-widest text-gray-500">Khoảng giá</span>
                        <span class="text-xs transform group-open:rotate-180 transition"><i class="fas fa-chevron-down"></i></span>
                    </summary>
                    <div class="flex items-center gap-2 mb-4">
                        <input type="number" placeholder="Từ" class="w-full border border-gray-200 p-2 text-sm outline-none focus:border-black rounded-none">
                        <span class="text-gray-400">-</span>
                        <input type="number" placeholder="Đến" class="w-full border border-gray-200 p-2 text-sm outline-none focus:border-black rounded-none">
                    </div>
                    <button class="w-full bg-gray-100 text-black text-xs font-bold uppercase py-2 hover:bg-black hover:text-white transition">Áp dụng</button>
                </details>
            </div>

            <!-- Ratting -->
            <div class="mb-8 border-t border-gray-100 pt-6">
                <details open class="group">
                    <summary class="flex justify-between items-center cursor-pointer mb-4">
                        <span class="text-xs font-bold uppercase tracking-widest text-gray-500">Đánh giá</span>
                        <span class="text-xs transform group-open:rotate-180 transition"><i class="fas fa-chevron-down"></i></span>
                    </summary>

                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" class="w-4 h-4 border-gray-300 rounded-none focus:ring-0 accent-black">
                            <div class="flex text-yellow-500 text-xs">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <span class="text-sm text-gray-400 group-hover:text-black transition text-xs ml-auto">(24)</span>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" class="w-4 h-4 border-gray-300 rounded-none focus:ring-0 accent-black">
                            <div class="flex text-yellow-500 text-xs items-center gap-2">
                                <div class="flex">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star text-gray-300"></i>
                                </div>
                                <span class="text-gray-500 text-[10px] uppercase font-bold">Trở lên</span>
                            </div>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" class="w-4 h-4 border-gray-300 rounded-none focus:ring-0 accent-black">
                            <div class="flex text-yellow-500 text-xs items-center gap-2">
                                <div class="flex">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star text-gray-300"></i><i class="far fa-star text-gray-300"></i>
                                </div>
                                <span class="text-gray-500 text-[10px] uppercase font-bold">Trở lên</span>
                            </div>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" class="w-4 h-4 border-gray-300 rounded-none focus:ring-0 accent-black">
                            <div class="flex text-yellow-500 text-xs items-center gap-2">
                                <div class="flex">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star text-gray-300"></i><i class="far fa-star text-gray-300"></i><i class="far fa-star text-gray-300"></i>
                                </div>
                                <span class="text-gray-500 text-[10px] uppercase font-bold">Trở lên</span>
                            </div>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" class="w-4 h-4 border-gray-300 rounded-none focus:ring-0 accent-black">
                            <div class="flex text-yellow-500 text-xs items-center gap-2">
                                <div class="flex">
                                    <i class="fas fa-star"></i><i class="far fa-star text-gray-300"></i><i class="far fa-star text-gray-300"></i><i class="far fa-star text-gray-300"></i><i class="far fa-star text-gray-300"></i>
                                </div>
                                <span class="text-gray-500 text-[10px] uppercase font-bold">Trở lên</span>
                            </div>
                        </label>
                    </div>
                </details>
            </div>
        </aside>

        <main class="flex-1 p-6 lg:p-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-10 pb-4 border-b border-gray-100">
                <div>
                    <span class="text-xs text-gray-400 uppercase tracking-widest">Kết quả tìm kiếm cho</span>
                    <h1 class="text-3xl font-serif mt-1 italic">"Váy dạ hội" <span class="text-lg not-italic text-gray-400 ">(12 kết quả)</span></h1>
                </div>

                <div class="flex gap-4 mt-4 md:mt-0 w-full md:w-auto">
                    <button class="lg:hidden flex-1 border border-gray-300 px-4 py-2 text-sm uppercase font-bold flex items-center justify-center gap-2">
                        <i class="fas fa-filter"></i> Lọc
                    </button>
                    <div class="relative group flex-1 md:flex-none">
                        <select class="appearance-none w-full md:w-48 bg-transparent border-b border-gray-300 py-2 pr-8 text-sm focus:outline-none cursor-pointer">
                            <option>Mới nhất</option>
                            <option>Giá: Thấp đến Cao</option>
                            <option>Giá: Cao đến Thấp</option>
                            <option>Bán chạy nhất</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-0 top-3 text-xs text-gray-400 pointer-events-none"></i>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-x-8 gap-y-12">
                <!-- Product List -->
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?q=80&w=1000" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Dress">

                        <div class="absolute top-4 left-4 flex flex-col gap-2">
                            <span class="bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold shadow-sm">New In</span>
                        </div>

                        <div class="absolute bottom-4 right-4 flex flex-col gap-2 translate-x-12 group-hover:translate-x-0 transition-transform duration-300">
                            <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow hover:bg-black hover:text-white transition" title="Thêm vào giỏ">
                                <i class="fas fa-plus"></i>
                            </button>
                            <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow hover:bg-black hover:text-white transition" title="Xem nhanh">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4 truncate">Midnight Silk Dress</h4>
                        <div class="flex justify-between items-center mt-1">
                            <p class="text-gray-500 text-sm">2.100.000 ₫</p>
                            <div class="flex -space-x-1">
                                <span class="w-3 h-3 rounded-full bg-black border border-white"></span>
                                <span class="w-3 h-3 rounded-full bg-blue-900 border border-white"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?q=80&w=1000" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Dress">

                        <div class="absolute bottom-4 right-4 flex flex-col gap-2 translate-x-12 group-hover:translate-x-0 transition-transform duration-300">
                            <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow hover:bg-black hover:text-white transition" title="Thêm vào giỏ">
                                <i class="fas fa-plus"></i>
                            </button>
                            <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow hover:bg-black hover:text-white transition" title="Xem nhanh">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4 truncate">Midnight Silk Dress</h4>
                        <div class="flex justify-between items-center mt-1">
                            <p class="text-gray-500 text-sm">2.100.000 ₫</p>
                            <div class="flex -space-x-1">
                                <span class="w-3 h-3 rounded-full bg-black border border-white"></span>
                                <span class="w-3 h-3 rounded-full bg-blue-900 border border-white"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?q=80&w=1000" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Dress">

                        <div class="absolute top-4 left-4 flex flex-col gap-2">
                            <span class="bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold shadow-sm">New In</span>
                        </div>

                        <div class="absolute bottom-4 right-4 flex flex-col gap-2 translate-x-12 group-hover:translate-x-0 transition-transform duration-300">
                            <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow hover:bg-black hover:text-white transition" title="Thêm vào giỏ">
                                <i class="fas fa-plus"></i>
                            </button>
                            <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow hover:bg-black hover:text-white transition" title="Xem nhanh">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4 truncate">Midnight Silk Dress</h4>
                        <div class="flex justify-between items-center mt-1">
                            <p class="text-gray-500 text-sm">2.100.000 ₫</p>
                            <div class="flex -space-x-1">
                                <span class="w-3 h-3 rounded-full bg-black border border-white"></span>
                                <span class="w-3 h-3 rounded-full bg-blue-900 border border-white"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?q=80&w=1000" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Dress">

                        <div class="absolute bottom-4 right-4 flex flex-col gap-2 translate-x-12 group-hover:translate-x-0 transition-transform duration-300">
                            <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow hover:bg-black hover:text-white transition" title="Thêm vào giỏ">
                                <i class="fas fa-plus"></i>
                            </button>
                            <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow hover:bg-black hover:text-white transition" title="Xem nhanh">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4 truncate">Midnight Silk Dress</h4>
                        <div class="flex justify-between items-center mt-1">
                            <p class="text-gray-500 text-sm">2.100.000 ₫</p>
                            <div class="flex -space-x-1">
                                <span class="w-3 h-3 rounded-full bg-black border border-white"></span>
                                <span class="w-3 h-3 rounded-full bg-blue-900 border border-white"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?q=80&w=1000" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Dress">

                        <div class="absolute bottom-4 right-4 flex flex-col gap-2 translate-x-12 group-hover:translate-x-0 transition-transform duration-300">
                            <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow hover:bg-black hover:text-white transition" title="Thêm vào giỏ">
                                <i class="fas fa-plus"></i>
                            </button>
                            <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow hover:bg-black hover:text-white transition" title="Xem nhanh">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4 truncate">Midnight Silk Dress</h4>
                        <div class="flex justify-between items-center mt-1">
                            <p class="text-gray-500 text-sm">2.100.000 ₫</p>
                            <div class="flex -space-x-1">
                                <span class="w-3 h-3 rounded-full bg-black border border-white"></span>
                                <span class="w-3 h-3 rounded-full bg-blue-900 border border-white"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-20 flex justify-center">
                <nav class="flex gap-2">
                    <a href="#" class="w-10 h-10 flex items-center justify-center border border-gray-200 hover:border-black transition text-gray-400 hover:text-black"><i class="fas fa-chevron-left"></i></a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center bg-black text-white border border-black font-bold text-sm">1</a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center border border-gray-200 hover:border-black transition text-sm">2</a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center border border-gray-200 hover:border-black transition text-sm">3</a>
                    <span class="w-10 h-10 flex items-center justify-center text-gray-400">...</span>
                    <a href="#" class="w-10 h-10 flex items-center justify-center border border-gray-200 hover:border-black transition text-gray-400 hover:text-black"><i class="fas fa-chevron-right"></i></a>
                </nav>
            </div>

        </main>
    </div>
@endsection()
