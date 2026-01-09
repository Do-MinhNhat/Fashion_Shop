<aside id="sidebar" class="fixed inset-y-0 left-0 z-30 w-64 bg-slate-900 text-white transition-transform duration-300 transform -translate-x-full md:translate-x-0 md:static md:inset-0 flex flex-col">
    <div class="h-16 flex items-center justify-center border-b border-slate-700 shadow-md">
        <span class="text-2xl font-bold tracking-wider">ADMIN STORE</span>
    </div>

    <nav class="flex-1 overflow-y-auto py-4 no-scrollbar">
        <div class="px-4 mb-2 text-xs text-gray-400 uppercase tracking-wider">Tổng quan</div>
        <a href="/Admin/index.html" class="flex items-center px-6 py-3 bg-slate-800 border-r-4 border-blue-500 text-blue-400 transition-all">
            <i class="fas fa-chart-line w-6"></i>
            <span class="font-medium">Dashboard</span>
        </a>

        <div class="px-4 mt-6 mb-2 text-xs text-gray-400 uppercase tracking-wider">Quản lý Bán hàng</div>
        <a href="/Admin/ProductManage.html" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 hover:text-white group">
            <i class="fas fa-box w-6 group-hover:text-blue-400 transition-colors"></i>
            <span>Sản phẩm</span>
        </a>
        <a href="/Admin/OrderManage.html" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 hover:text-white group">
            <i class="fas fa-shopping-cart w-6 group-hover:text-blue-400 transition-colors"></i>
            <span>Đơn hàng</span>
            <span class="ml-auto bg-red-500 text-white text-[10px] font-bold py-0.5 px-2 rounded-full">3</span>
        </a>
        <a href="#" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 hover:text-white group">
            <i class="fas fa-users w-6 group-hover:text-blue-400 transition-colors"></i>
            <span>Khách hàng</span>
        </a>

        <div class="px-4 mt-6 mb-2 text-xs text-gray-400 uppercase tracking-wider">Kho & Nhập hàng</div>
        <a href="#" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 hover:text-white group">
            <i class="fas fa-file-import w-6 group-hover:text-blue-400 transition-colors"></i>
            <span>Phiếu nhập</span>
        </a>
        <a href="#" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 hover:text-white group">
            <i class="fas fa-truck w-6 group-hover:text-blue-400 transition-colors"></i>
            <span>Giao hàng</span>
        </a>

        <div class="px-4 mt-6 mb-2 text-xs text-gray-400 uppercase tracking-wider">Cấu hình</div>
        <a href="#" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 hover:text-white group">
            <i class="fas fa-cog w-6 group-hover:text-blue-400 transition-colors"></i>
            <span>Cài đặt hệ thống</span>
        </a>
    </nav>
</aside>
