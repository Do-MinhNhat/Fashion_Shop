<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Đơn hàng - Admin Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        body { font-family: "Inter", sans-serif; }
        
        .modal { transition: opacity 0.25s ease; }
        body.modal-active { overflow-x: hidden; overflow-y: hidden !important; }

        body {
            font-family: "Inter", sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
    <div class="flex h-screen overflow-hidden bg-gray-50">
        <div id="sidebarOverlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black opacity-50 z-20 hidden md:hidden"></div>
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-30 w-64 bg-slate-900 text-white transition-transform duration-300 transform -translate-x-full md:translate-x-0 md:static md:inset-0 flex flex-col">
            <div class="h-16 flex items-center justify-center border-b border-slate-700 shadow-md">
                <span class="text-2xl font-bold tracking-wider">ADMIN STORE</span>
            </div>
            
            <nav class="flex-1 overflow-y-auto py-4 no-scrollbar">
                <div class="px-4 mb-2 text-xs text-gray-400 uppercase tracking-wider">Tổng quan</div>
                <a href="/Admin/index.html" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 hover:text-white">
                    <i class="fas fa-chart-line w-6"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                <div class="px-4 mt-6 mb-2 text-xs text-gray-400 uppercase tracking-wider">Quản lý Bán hàng</div>
                <a href="/Admin/ProductManage.html" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 hover:text-white group">
                    <i class="fas fa-box w-6 group-hover:text-blue-400 transition-colors"></i>
                    <span>Sản phẩm</span>
                </a>
                <a href="/Admin/OrderManage.html" class="flex items-center px-6 py-3 bg-slate-800 border-r-4 border-blue-500 text-blue-400 transition-all">
                    <i class="fas fa-shopping-cart w-6"></i>
                    <span>Đơn hàng</span>
                    <span class="ml-auto bg-red-500 text-white text-[10px] font-bold py-0.5 px-2 rounded-full">3</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 hover:text-white group">
                    <i class="fas fa-users w-6 group-hover:text-blue-400 transition-colors"></i>
                    <span>Khách hàng</span>
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
                        <h1 class="text-lg font-semibold text-gray-700">Quản lý Đơn hàng</h1>
                        <span class="text-xs text-gray-500">Tổng quan các đơn đặt hàng</span>
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
                            <input type="text" class="w-full py-2 pl-10 pr-4 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Tìm theo Mã đơn, Tên KH...">
                        </div>

                        <select class="py-2 px-4 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Tất cả trạng thái</option>
                            <option value="pending">Chờ xử lý</option>
                            <option value="shipping">Đang giao hàng</option>
                            <option value="completed">Hoàn thành</option>
                            <option value="cancelled">Đã hủy</option>
                        </select>

                        <div class="relative">
                            <input type="date" class="py-2 px-4 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-file-export mr-2"></i> Xuất Excel
                        </button>
                        <button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 shadow-sm">
                            <i class="fas fa-plus mr-2"></i> Tạo đơn mới
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
                                    <th class="px-6 py-3">Ngày đặt</th>
                                    <th class="px-6 py-3">Thanh toán</th>
                                    <th class="px-6 py-3">Trạng thái</th>
                                    <th class="px-6 py-3">Tổng tiền</th>
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
                                                <div class="text-xs text-gray-500">0988.xxx.xxx</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">05/01/2024</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span> Chưa thanh toán
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">
                                            Chờ xử lý
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-bold text-gray-800">1.500.000 ₫</td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <button onclick="openModal('#ORD-2024-001')" class="text-gray-500 hover:text-blue-600" title="Xem chi tiết"><i class="fas fa-eye"></i></button>
                                            <button class="text-gray-500 hover:text-green-600" title="Duyệt đơn"><i class="fas fa-check"></i></button>
                                            <button class="text-gray-500 hover:text-red-600" title="Hủy đơn"><i class="fas fa-trash-alt"></i></button>
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
                                                <div class="text-xs text-gray-500">tranb@gmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">04/01/2024</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> Đã thanh toán
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 rounded text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                            <i class="fas fa-truck text-[10px] mr-1"></i> Đang giao
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-bold text-gray-800">850.000 ₫</td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <button onclick="openModal('#ORD-2024-002')" class="text-gray-500 hover:text-blue-600"><i class="fas fa-eye"></i></button>
                                            <button class="text-gray-500 hover:text-orange-600"><i class="fas fa-print"></i></button>
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
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">03/01/2024</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> Đã thanh toán
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 rounded text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                            Hoàn thành
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-bold text-gray-800">450.000 ₫</td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <button class="text-gray-500 hover:text-blue-600"><i class="fas fa-eye"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-sm text-gray-500">Hiển thị <span class="font-semibold text-gray-800">1-10</span> trong số <span class="font-semibold text-gray-800">45</span> đơn hàng</span>
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

    <div id="orderModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeModal()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
                <div class="bg-gray-50 px-4 py-3 sm:px-6 flex justify-between items-center border-b">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        Chi tiết đơn hàng <span class="text-blue-600" id="modalOrderId">#ORD-001</span>
                    </h3>
                    <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none" onclick="closeModal()">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <div class="px-4 py-5 sm:p-6">
                    <div class="flex flex-wrap gap-4 justify-between mb-6 pb-6 border-b border-gray-100">
                        <div>
                            <p class="text-sm text-gray-500">Ngày đặt hàng</p>
                            <p class="font-medium">05/01/2024 - 14:30</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Phương thức thanh toán</p>
                            <p class="font-medium">COD (Thanh toán khi nhận)</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Trạng thái</p>
                            <span class="px-2 py-1 rounded text-xs font-bold bg-yellow-100 text-yellow-800">Chờ xử lý</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-bold text-sm text-gray-700 mb-2 uppercase">Thông tin khách hàng</h4>
                            <p class="text-sm text-gray-600 font-semibold">Nguyễn Văn A</p>
                            <p class="text-sm text-gray-500">Email: nguyenva@example.com</p>
                            <p class="text-sm text-gray-500">SĐT: 0988.123.456</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-bold text-sm text-gray-700 mb-2 uppercase">Địa chỉ giao hàng</h4>
                            <p class="text-sm text-gray-500">Số 123, Đường ABC, Phường XYZ</p>
                            <p class="text-sm text-gray-500">Quận Cầu Giấy, Hà Nội</p>
                        </div>
                    </div>

                    <h4 class="font-bold text-gray-700 mb-3">Sản phẩm</h4>
                    <div class="border rounded-lg overflow-hidden mb-6">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sản phẩm</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Giá</th>
                                    <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">SL</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Tổng</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-900">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gray-200 rounded mr-2"></div>
                                            Áo sơ mi lụa tơ tằm
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 text-right">500.000 ₫</td>
                                    <td class="px-4 py-3 text-sm text-gray-500 text-center">2</td>
                                    <td class="px-4 py-3 text-sm text-gray-900 text-right font-medium">1.000.000 ₫</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-900">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gray-200 rounded mr-2"></div>
                                            Quần âu nam
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 text-right">480.000 ₫</td>
                                    <td class="px-4 py-3 text-sm text-gray-500 text-center">1</td>
                                    <td class="px-4 py-3 text-sm text-gray-900 text-right font-medium">480.000 ₫</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-col items-end">
                        <div class="w-full md:w-1/2 space-y-2">
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>Tạm tính:</span>
                                <span>1.480.000 ₫</span>
                            </div>
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>Phí vận chuyển:</span>
                                <span>20.000 ₫</span>
                            </div>
                            <div class="flex justify-between text-base font-bold text-gray-800 border-t pt-2">
                                <span>Tổng cộng:</span>
                                <span class="text-blue-600">1.500.000 ₫</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-2">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 sm:w-auto sm:text-sm">
                        <i class="fas fa-print mr-2 pt-1"></i> In hóa đơn
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:w-auto sm:text-sm" onclick="closeModal()">
                        Đóng
                    </button>
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