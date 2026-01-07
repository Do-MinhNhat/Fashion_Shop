<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management - Optimized</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { serif: ['"Playfair Display"', 'serif'], sans: ['"Inter"', 'sans-serif'] },
                    colors: { brand: { black: '#1a1a1a', gray: '#f4f4f5' } }
                }
            }
        }
    </script>
    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #9ca3af; }
        body {
            scrollbar-width: thin;
            scrollbar-color: #d1d5db #f1f1f1;
            font-family: "Inter", sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-slate-800 font-sans h-screen flex overflow-hidden selection:bg-black selection:text-white">
    <div id="sidebarOverlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black opacity-50 z-20 hidden md:hidden"></div>
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

    <main class="flex-1 flex flex-col relative overflow-hidden bg-gray-50/50">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 z-10">
            <h1 class="text-lg font-bold text-gray-800">Quản lý sản phẩm</h1>
            <div class="flex items-center gap-4">
                <button type="button" onclick="toggleDrawer(true)" class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center text-gray-500">
                    <i class="far fa-bell"></i>
                </button>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 custom-scrollbar">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-xl">
                        <i class="fas fa-cube"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-bold tracking-wider">Tổng sản phẩm</p>
                        <p class="text-2xl font-serif font-bold text-gray-900">1,240</p>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-red-50 text-red-500 flex items-center justify-center text-xl">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-bold tracking-wider">Sắp hết hàng</p>
                        <p class="text-2xl font-serif font-bold text-red-500">12</p>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-green-50 text-green-600 flex items-center justify-center text-xl">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-bold tracking-wider">Đang hiển thị</p>
                        <p class="text-2xl font-serif font-bold text-gray-900">1,180</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                <div class="relative w-full md:w-96">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" placeholder="Tìm kiếm sản phẩm..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition shadow-sm">
                </div>
                <div class="flex gap-3 w-full md:w-auto">
                    <button class="px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 shadow-sm">
                        <i class="fas fa-filter mr-2"></i> Bộ lọc
                    </button>
                    <button onclick="toggleDrawer(true)" class="px-5 py-2.5 bg-black text-white rounded-lg text-sm font-bold hover:bg-gray-800 shadow-lg shadow-black/20 flex items-center gap-2 transition-transform active:scale-95">
                        <i class="fas fa-plus"></i> Thêm mới
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="p-4 w-10 text-center"><input type="checkbox" class="rounded accent-black"></th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Sản phẩm</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Trạng thái</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Kho hàng</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Giá bán</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="group hover:bg-gray-50 transition">
                            <td class="p-4 text-center"><input type="checkbox" class="rounded accent-black"></td>
                            <td class="p-4">
                                <div class="flex items-center gap-4">
                                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=100&q=80" class="w-10 h-14 object-cover rounded bg-gray-100">
                                    <div>
                                        <p class="font-medium text-gray-900 group-hover:text-blue-600 transition">Floral Silk Dress</p>
                                        <p class="text-xs text-gray-500">SKU: DR-001 • Váy đầm</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Active
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-gray-600">45</span>
                                    <div class="w-16 h-1 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-black w-[80%]"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 text-sm font-medium">1.250.000₫</td>
                            <td class="p-4 text-right">
                                <button class="text-gray-400 hover:text-black p-2 transition"><i class="fas fa-edit"></i></button>
                                <button class="text-gray-400 hover:text-red-500 p-2 transition"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr class="group hover:bg-gray-50 transition">
                            <td class="p-4 text-center"><input type="checkbox" class="rounded accent-black"></td>
                            <td class="p-4">
                                <div class="flex items-center gap-4">
                                    <img src="https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9?w=100&q=80" class="w-10 h-14 object-cover rounded bg-gray-100">
                                    <div>
                                        <p class="font-medium text-gray-900 group-hover:text-blue-600 transition">Basic White Tee</p>
                                        <p class="text-xs text-gray-500">SKU: TS-099 • Áo thun</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-50 text-yellow-700 border border-yellow-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> Low Stock
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-red-500 font-bold">03</span>
                                    <div class="w-16 h-1 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-red-500 w-[10%]"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 text-sm font-medium">350.000₫</td>
                            <td class="p-4 text-right">
                                <button class="text-gray-400 hover:text-black p-2 transition"><i class="fas fa-edit"></i></button>
                                <button class="text-gray-400 hover:text-red-500 p-2 transition"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                    <span class="text-xs text-gray-500">Hiển thị 1-10 trên 124</span>
                    <div class="flex gap-1">
                        <button class="px-3 py-1 border rounded hover:bg-gray-50 text-xs">Trước</button>
                        <button class="px-3 py-1 bg-black text-white rounded text-xs">1</button>
                        <button class="px-3 py-1 border rounded hover:bg-gray-50 text-xs">2</button>
                        <button class="px-3 py-1 border rounded hover:bg-gray-50 text-xs">Sau</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Popup Add Product -->
    <div id="drawer-backdrop" onclick="toggleDrawer(false)" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 hidden transition-opacity duration-300 opacity-0">
        <div id="drawer-panel" class="fixed inset-y-0 right-0 w-full md:w-[850px] bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col"></div>
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-white">
            <div>
                <h2 class="text-xl font-serif font-bold text-gray-900">Thêm sản phẩm mới</h2>
                <p class="text-xs text-gray-500 mt-1">Điền thông tin chi tiết sản phẩm để đăng bán.</p>
            </div>
            <button onclick="toggleDrawer(false)" class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center text-gray-500 transition">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto p-6 bg-gray-50 custom-scrollbar">
            <form id="product-form" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-sm">
                        <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wide">Thông tin chung</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tên sản phẩm <span class="text-red-500">*</span></label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-black focus:border-black outline-none transition" placeholder="Ví dụ: Áo sơ mi lụa tơ tằm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả</label>
                                <textarea rows="6" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-black focus:border-black outline-none transition text-sm"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-sm">
                        <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wide">Hình ảnh (Media)</h3>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:bg-gray-50 transition cursor-pointer group">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 group-hover:text-black mb-3 transition"></i>
                            <p class="text-sm text-gray-600 font-medium">Kéo thả hình ảnh vào đây hoặc click để tải lên</p>
                            <p class="text-xs text-gray-400 mt-1">Hỗ trợ: JPG, PNG, WEBP (Tối đa 5MB)</p>
                        </div>
                        <div class="flex gap-3 mt-4 overflow-x-auto pb-2">
                            <div class="w-20 h-24 flex-shrink-0 relative rounded overflow-hidden border border-gray-200 group">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=100" class="w-full h-full object-cover">
                                <button type="button" class="absolute top-1 right-1 w-5 h-5 bg-red-500 text-white rounded-full text-xs flex items-center justify-center opacity-0 group-hover:opacity-100 transition">×</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-sm">
                        <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wide">Trạng thái</h3>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-black focus:border-black outline-none bg-white">
                            <option value="active">Đang bán (Active)</option>
                            <option value="draft">Bản nháp (Draft)</option>
                            <option value="archived">Lưu trữ (Archived)</option>
                        </select>
                    </div>

                    <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-sm space-y-4">
                        <h3 class="text-sm font-bold text-gray-900 mb-0 uppercase tracking-wide">Phân loại</h3>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Danh mục</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded text-sm bg-white">
                                <option>-- Chọn danh mục --</option>
                                <option>Váy đầm</option>
                                <option>Áo thun</option>
                                <option>Quần tây</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Mã SKU</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded text-sm" placeholder="VD: SP-001">
                        </div>
                    </div>

                    <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-sm space-y-4">
                        <h3 class="text-sm font-bold text-gray-900 mb-0 uppercase tracking-wide">Giá bán</h3>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Giá niêm yết</label>
                            <div class="relative">
                                <input type="number" class="w-full pl-3 pr-8 py-2 border border-gray-300 rounded text-sm font-bold text-gray-800" placeholder="0">
                                <span class="absolute right-3 top-2 text-xs text-gray-400">₫</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Giá khuyến mãi</label>
                            <div class="relative">
                                <input type="number" class="w-full pl-3 pr-8 py-2 border border-gray-300 rounded text-sm" placeholder="0">
                                <span class="absolute right-3 top-2 text-xs text-gray-400">₫</span>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

        <div class="px-6 py-4 bg-white border-t border-gray-100 flex justify-between items-center z-10">
            <button onclick="toggleDrawer(false)" class="text-sm font-bold text-gray-500 hover:text-black uppercase tracking-wider px-4">Hủy</button>
            <button class="bg-black text-white px-8 py-3 rounded text-xs font-bold uppercase tracking-widest hover:bg-gray-800 transition shadow-lg shadow-black/20">Lưu sản phẩm</button>
        </div>
    </div>

    <script>
        function toggleDrawer(show) {
            const backdrop = document.getElementById('drawer-backdrop');
            const panel = document.getElementById('drawer-panel');

            if (show) {
                backdrop.classList.remove('hidden');
                setTimeout(() => {
                    backdrop.classList.remove('opacity-0');
                    panel.classList.remove('translate-x-full');
                }, 10);
            } else {
                backdrop.classList.add('opacity-0');
                panel.classList.add('translate-x-full');
                
                setTimeout(() => {
                    backdrop.classList.add('hidden');
                }, 300);
            }
        }

        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        function toggleSidebar() {
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }
    </script>
</body>
</html>