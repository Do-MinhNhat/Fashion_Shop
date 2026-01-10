<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Giao hàng - Admin Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        body { font-family: "Inter", sans-serif; }

        .modal { transition: opacity 0.25s ease; }
        body.modal-active { overflow-x: hidden; overflow-y: hidden !important; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <div class="flex h-screen overflow-hidden bg-gray-50">
        <div id="sidebarOverlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black opacity-50 z-20 hidden md:hidden"></div>
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-30 w-64 bg-slate-900 text-white transition-transform duration-300 transform -translate-x-full md:translate-x-0 md:static md:inset-0 flex flex-col">
            <div class="h-16 flex items-center justify-center border-b border-slate-700 shadow-md">
                <span class="text-2xl font-bold tracking-wider">ADMIN STORE</span>
            </div>

            <nav class="flex-1 overflow-y-auto py-4 no-scrollbar">
                <div class="px-4 mb-2 text-xs text-gray-400 uppercase tracking-wider">Tổng quan</div>
                <a href="/Admin/index.html" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 hover:text-white group">
                    <i class="fas fa-chart-line w-6 group-hover:text-blue-400 transition-colors"></i>
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
                </a>
                <a href="/Admin/UserManage.html" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 hover:text-white group">
                    <i class="fas fa-users w-6 group-hover:text-blue-400 transition-colors"></i>
                    <span>Khách hàng</span>
                </a>

                <div class="px-4 mt-6 mb-2 text-xs text-gray-400 uppercase tracking-wider">Kho & Nhập hàng</div>
                <a href="/Admin/ImportProduct.html" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 hover:text-white group">
                    <i class="fas fa-file-import w-6 group-hover:text-blue-400 transition-colors"></i>
                    <span>Phiếu nhập</span>
                </a>
                <a href="/Admin/Shipper.html" class="flex items-center px-6 py-3 bg-slate-800 border-r-4 border-blue-500 text-blue-400 transition-all">
                    <i class="fas fa-truck w-6"></i>
                    <span class="font-medium">Giao hàng</span>
                </a>

                <div class="px-4 mt-6 mb-2 text-xs text-gray-400 uppercase tracking-wider">Cấu hình</div>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 hover:text-white group">
                    <i class="fas fa-cog w-6 group-hover:text-blue-400 transition-colors"></i>
                    <span>Cài đặt hệ thống</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="h-16 bg-white border-b flex items-center justify-between px-6 shadow-sm z-10">
                <div class="flex items-center gap-4">
                    <button onclick="toggleSidebar()" class="md:hidden text-gray-600 hover:text-blue-600 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="flex flex-col">
                        <h1 class="text-lg font-semibold text-gray-700">Quản lý Giao hàng</h1>
                        <span class="text-xs text-gray-500">Theo dõi và quản lý đơn hàng đang giao</span>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-3">
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=0D8ABC&color=fff" class="w-8 h-8 rounded-full">
                        <span class="text-sm font-medium hidden md:block">Admin User</span>
                    </div>
                </div>
            </header>

            <div class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100 mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="flex flex-col md:flex-row gap-4 flex-1">
                        <div class="relative w-full md:w-64">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" class="w-full py-2 pl-10 pr-4 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Tìm theo Mã đơn, Shipper...">
                        </div>

                        <select class="py-2 px-4 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Tất cả trạng thái</option>
                            <option value="assigned">Đã gán shipper</option>
                            <option value="in_transit">Đang vận chuyển</option>
                            <option value="delivered">Đã giao</option>
                            <option value="failed">Giao thất bại</option>
                        </select>

                        <div class="relative">
                            <input type="date" class="py-2 px-4 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-file-export mr-2"></i> Xuất Excel
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                                <tr>
                                    <th class="p-4 w-4">
                                        <div class="flex items-center">
                                            <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                        </div>
                                    </th>
                                    <th class="px-6 py-3">Mã đơn</th>
                                    <th class="px-6 py-3">Khách hàng</th>
                                    <th class="px-6 py-3">Shipper</th>
                                    <th class="px-6 py-3">Trạng thái</th>
                                    <th class="px-6 py-3">Ngày giao</th>
                                    <th class="px-6 py-3">Tracking</th>
                                    <th class="px-6 py-3 text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr class="bg-white hover:bg-gray-50 transition-colors group">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-blue-600 cursor-pointer hover:underline" onclick="openModal('#ORD-2024-001')">#ORD-001</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-xs font-bold text-slate-600">NV</div>
                                            <div>
                                                <div class="font-medium text-gray-800">Nguyễn Văn A</div>
                                                <div class="text-xs text-gray-500">Hà Nội</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <img src="https://ui-avatars.com/api/?name=Shipper+1&background=random" class="w-8 h-8 rounded-full">
                                            <div>
                                                <div class="font-medium text-gray-800">Nguyễn Shipper</div>
                                                <div class="text-xs text-gray-500">0987.xxx.xxx</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 rounded text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                            <i class="fas fa-truck text-[10px] mr-1"></i> Đang giao
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">05/01/2024</td>
                                    <td class="px-6 py-4">
                                        <span class="text-xs text-gray-600">VN123456789</span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <button onclick="openModal('#ORD-2024-001')" class="text-gray-500 hover:text-blue-600" title="Xem chi tiết"><i class="fas fa-eye"></i></button>
                                            <button class="text-gray-500 hover:text-green-600" title="Cập nhật trạng thái"><i class="fas fa-edit"></i></button>
                                            <button class="text-gray-500 hover:text-orange-600" title="Gọi shipper"><i class="fas fa-phone"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="bg-white hover:bg-gray-50 transition-colors">
                                    <td class="w-4 p-4"><input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded"></td>
                                    <td class="px-6 py-4 font-medium text-blue-600 cursor-pointer hover:underline" onclick="openModal('#ORD-2024-002')">#ORD-002</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <img src="https://ui-avatars.com/api/?name=Tran+B&background=random" class="w-8 h-8 rounded-full">
                                            <div>
                                                <div class="font-medium text-gray-800">Trần Thị B</div>
                                                <div class="text-xs text-gray-500">TP.HCM</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 rounded-full bg-green-200 flex items-center justify-center text-xs font-bold text-green-600">TS</div>
                                            <div>
                                                <div class="font-medium text-gray-800">Trần Shipper</div>
                                                <div class="text-xs text-gray-500">Chưa gán</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">
                                            Chờ gán shipper
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">04/01/2024</td>
                                    <td class="px-6 py-4">
                                        <span class="text-xs text-gray-400">-</span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <button onclick="openModal('#ORD-2024-002')" class="text-gray-500 hover:text-blue-600"><i class="fas fa-eye"></i></button>
                                            <button class="text-gray-500 hover:text-purple-600" title="Gán shipper"><i class="fas fa-user-plus"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="bg-white hover:bg-gray-50 transition-colors">
                                    <td class="w-4 p-4"><input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded"></td>
                                    <td class="px-6 py-4 font-medium text-blue-600 cursor-pointer hover:underline">#ORD-003</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 rounded-full bg-purple-200 flex items-center justify-center text-xs font-bold text-purple-600">LC</div>
                                            <div>
                                                <div class="font-medium text-gray-800">Lê Văn C</div>
                                                <div class="text-xs text-gray-500">Đà Nẵng</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <img src="https://ui-avatars.com/api/?name=Shipper+3&background=random" class="w-8 h-8 rounded-full">
                                            <div>
                                                <div class="font-medium text-gray-800">Lê Shipper</div>
                                                <div class="text-xs text-gray-500">0965.xxx.xxx</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 rounded text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                            Đã giao
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">03/01/2024</td>
                                    <td class="px-6 py-4">
                                        <span class="text-xs text-gray-600">VN987654321</span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <button class="text-gray-500 hover:text-blue-600"><i class="fas fa-eye"></i></button>
                                            <button class="text-gray-500 hover:text-orange-600"><i class="fas fa-print"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-sm text-gray-500">Hiển thị <span class="font-semibold text-gray-800">1-10</span> trong số <span class="font-semibold text-gray-800">25</span> đơn hàng</span>
                        <div class="flex gap-1">
                            <button class="px-3 py-1 text-sm border rounded hover:bg-gray-50 disabled:opacity-50">Trước</button>
                            <button class="px-3 py-1 text-sm border rounded bg-blue-600 text-white hover:bg-blue-700">1</button>
                            <button class="px-3 py-1 text-sm border rounded hover:bg-gray-50">2</button>
                            <button class="px-3 py-1 text-sm border rounded hover:bg-gray-50">3</button>
                            <button class="px-3 py-1 text-sm border rounded hover:bg-gray-50">Sau</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal for order details -->
    <div id="orderModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 modal">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-800">Chi tiết đơn hàng <span id="modalOrderId" class="text-blue-600"></span></h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-medium text-gray-800 mb-3">Thông tin khách hàng</h4>
                            <div class="space-y-2 text-sm">
                                <p><span class="font-medium">Tên:</span> Nguyễn Văn A</p>
                                <p><span class="font-medium">SĐT:</span> 0988.xxx.xxx</p>
                                <p><span class="font-medium">Địa chỉ:</span> 123 Đường ABC, Quận 1, TP.HCM</p>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800 mb-3">Thông tin giao hàng</h4>
                            <div class="space-y-2 text-sm">
                                <p><span class="font-medium">Shipper:</span> Nguyễn Shipper</p>
                                <p><span class="font-medium">Trạng thái:</span> Đang giao</p>
                                <p><span class="font-medium">Tracking:</span> VN123456789</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <h4 class="font-medium text-gray-800 mb-3">Sản phẩm</h4>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center py-2 border-b">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?w=50&q=80" class="w-10 h-10 object-cover rounded">
                                    <div>
                                        <p class="text-sm font-medium">Áo sơ mi lụa</p>
                                        <p class="text-xs text-gray-500">x1</p>
                                    </div>
                                </div>
                                <span class="text-sm font-medium">750.000 ₫</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 border-t border-gray-200 flex justify-end gap-3">
                    <button onclick="closeModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Đóng</button>
                    <button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Cập nhật trạng thái</button>
                </div>
            </div>
        </div>
    </div>

    <script>
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

        const modal = document.getElementById('orderModal');
        const modalOrderId = document.getElementById('modalOrderId');

        function openModal(orderId) {
            if(orderId) {
                modalOrderId.innerText = orderId;
            }
            modal.classList.remove('hidden');
            document.body.classList.add('modal-active');
        }

        function closeModal() {
            modal.classList.add('hidden');
            document.body.classList.remove('modal-active');
        }

        document.onkeydown = function(evt) {
            evt = evt || window.event;
            if (evt.keyCode == 27) {
                closeModal();
            }
        };
    </script>
</body>
</html>
