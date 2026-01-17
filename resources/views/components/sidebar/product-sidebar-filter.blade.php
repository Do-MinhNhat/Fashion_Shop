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
                    <span class="text-gray-400 group-hover:text-black transition text-xs ml-auto">(24)</span>
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