<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Thành viên - Admin Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        body { font-family: "Inter", sans-serif; }
        .modal { transition: opacity 0.25s ease; }
        body.modal-active { overflow-x: hidden; overflow-y: hidden !important; }
        body { font-family: "Inter", sans-serif; }
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
                <a href="/Admin/index.html" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 transition-all">
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
                </a>
                <a href="/Admin/UserManage.html" class="flex items-center px-6 py-3 bg-slate-800 border-r-4 border-blue-500 text-blue-400 transition-all hover:text-white group">
                    <i class="fas fa-users w-6 group-hover:text-blue-400 transition-colors"></i>
                    <span>Khách hàng</span>
                </a>

                <div class="px-4 mt-6 mb-2 text-xs text-gray-400 uppercase tracking-wider">Kho & Nhập hàng</div>
                <a href="/Admin/ImportProduct.html" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 hover:text-white group">
                    <i class="fas fa-file-import w-6 group-hover:text-blue-400 transition-colors"></i>
                    <span>Phiếu nhập</span>
                </a>
                <a href="/Admin/ImportProduct.html" class="flex items-center px-6 py-3 hover:bg-slate-800 transition-colors text-gray-300 hover:text-white group">
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

        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="h-16 bg-white border-b flex items-center justify-between px-6 shadow-sm z-10">
                <div class="flex items-center gap-4">
                    <button onclick="toggleSidebar()" class="md:hidden text-gray-600 hover:text-blue-600 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="flex flex-col">
                        <h1 class="text-lg font-semibold text-gray-700">Quản lý Thành viên</h1>
                        <span class="text-xs text-gray-500">Danh sách khách hàng và nhân viên</span>
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
                        <div class="relative w-full md:w-72">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" class="w-full py-2 pl-10 pr-4 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Tìm tên, email, số điện thoại...">
                        </div>
                        
                        <select class="py-2 px-4 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Tất cả vai trò</option>
                            <option value="admin">Quản trị viên (Admin)</option>
                            <option value="staff">Nhân viên</option>
                            <option value="customer">Khách hàng</option>
                        </select>
                        
                        <select class="py-2 px-4 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Tất cả trạng thái</option>
                            <option value="active">Đang hoạt động</option>
                            <option value="banned">Đã khóa</option>
                        </select>
                    </div>

                    <button onclick="openUserModal('add')" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 shadow-sm flex items-center justify-center">
                        <i class="fas fa-user-plus mr-2"></i> Thêm mới
                    </button>
                </div>

                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                                <tr>
                                    <th class="px-6 py-3 w-4">#</th>
                                    <th class="px-6 py-3">Thông tin thành viên</th>
                                    <th class="px-6 py-3">Vai trò</th>
                                    <th class="px-6 py-3">Ngày tham gia</th>
                                    <th class="px-6 py-3">Trạng thái</th>
                                    <th class="px-6 py-3 text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr class="bg-white hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">1</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <img class="w-9 h-9 rounded-full object-cover border border-gray-200" src="https://ui-avatars.com/api/?name=Admin+Manager&background=0D8ABC&color=fff" alt="Avatar">
                                            <div>
                                                <div class="font-medium text-gray-900">Nguyễn Quản Trị</div>
                                                <div class="text-xs text-gray-500">admin@store.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                            <i class="fas fa-crown text-[10px] mr-1"></i> Quản trị viên
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">01/01/2023</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Hoạt động
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button class="text-gray-400 hover:text-blue-600 mx-1" onclick="openUserModal('edit')"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>

                                <tr class="bg-white hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">2</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <img class="w-9 h-9 rounded-full object-cover border border-gray-200" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&q=80" alt="Avatar">
                                            <div>
                                                <div class="font-medium text-gray-900">Trần Thu Ngân</div>
                                                <div class="text-xs text-gray-500">staff.ngan@store.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                            <i class="fas fa-id-badge text-[10px] mr-1"></i> Nhân viên
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">15/06/2023</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Hoạt động
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button class="text-gray-400 hover:text-blue-600 mx-1" onclick="openUserModal('edit')"><i class="fas fa-edit"></i></button>
                                        <button class="text-gray-400 hover:text-red-600 mx-1"><i class="fas fa-lock"></i></button>
                                    </td>
                                </tr>

                                <tr class="bg-red-50 hover:bg-red-100 transition-colors">
                                    <td class="px-6 py-4">3</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-bold text-xs">VH</div>
                                            <div>
                                                <div class="font-medium text-gray-900">Vũ Hủy Diệt</div>
                                                <div class="text-xs text-gray-500">spam.user@gmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                            Khách hàng
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">20/12/2023</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                            Đã khóa
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button class="text-gray-400 hover:text-blue-600 mx-1" onclick="openUserModal('edit')"><i class="fas fa-edit"></i></button>
                                        <button class="text-red-500 hover:text-green-600 mx-1" title="Mở khóa"><i class="fas fa-unlock"></i></button>
                                        <button class="text-gray-400 hover:text-red-600 mx-1"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>

                                <tr class="bg-white hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">4</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <img class="w-9 h-9 rounded-full object-cover border border-gray-200" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&q=80" alt="Avatar">
                                            <div>
                                                <div class="font-medium text-gray-900">Lê Khách Hàng</div>
                                                <div class="text-xs text-gray-500">customer1@gmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                            Khách hàng
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">02/01/2024</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Hoạt động
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button class="text-gray-400 hover:text-blue-600 mx-1" onclick="openUserModal('edit')"><i class="fas fa-edit"></i></button>
                                        <button class="text-gray-400 hover:text-red-600 mx-1"><i class="fas fa-lock"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between bg-gray-50">
                        <span class="text-sm text-gray-500">Hiển thị 1-4 trong số 120 thành viên</span>
                        <div class="flex gap-1">
                            <button class="w-8 h-8 flex items-center justify-center rounded border bg-white hover:bg-gray-50 text-gray-600"><i class="fas fa-chevron-left text-xs"></i></button>
                            <button class="w-8 h-8 flex items-center justify-center rounded border bg-blue-600 text-white">1</button>
                            <button class="w-8 h-8 flex items-center justify-center rounded border bg-white hover:bg-gray-50 text-gray-600">2</button>
                            <button class="w-8 h-8 flex items-center justify-center rounded border bg-white hover:bg-gray-50 text-gray-600">...</button>
                            <button class="w-8 h-8 flex items-center justify-center rounded border bg-white hover:bg-gray-50 text-gray-600"><i class="fas fa-chevron-right text-xs"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="userModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeUserModal()"></div>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-0 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modalTitle">Thêm thành viên mới</h3>
                            
                            <form id="userForm">
                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Họ và tên</label>
                                        <input type="text" class="w-full p-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 text-sm" placeholder="Nhập họ tên">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                        <input type="email" class="w-full p-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 text-sm" placeholder="example@gmail.com">
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại</label>
                                            <input type="text" class="w-full p-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 text-sm">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Vai trò</label>
                                            <select class="w-full p-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 text-sm">
                                                <option value="customer">Khách hàng</option>
                                                <option value="staff">Nhân viên</option>
                                                <option value="admin">Quản trị viên</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="border-t pt-4 mt-2">
                                        <div class="flex items-center justify-between">
                                            <label class="text-sm font-medium text-gray-700">Trạng thái hoạt động</label>
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" checked class="sr-only peer">
                                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="border-t pt-4 mt-2 bg-yellow-50 p-3 rounded border-yellow-100 hidden" id="passwordNote">
                                        <p class="text-xs text-yellow-700"><i class="fas fa-exclamation-triangle mr-1"></i> Để trống mật khẩu nếu không muốn thay đổi.</p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu</label>
                                        <input type="password" class="w-full p-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 text-sm" placeholder="********">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-2">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 sm:w-auto sm:text-sm">
                        Lưu thông tin
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:w-auto sm:text-sm" onclick="closeUserModal()">
                        Hủy bỏ
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

        const userModal = document.getElementById('userModal');
        const modalTitle = document.getElementById('modalTitle');
        const passwordNote = document.getElementById('passwordNote');

        function openUserModal(mode) {
            userModal.classList.remove('hidden');
            document.body.classList.add('modal-active');
            
            if (mode === 'edit') {
                modalTitle.innerText = "Chỉnh sửa thông tin";
                passwordNote.classList.remove('hidden');
            } else {
                modalTitle.innerText = "Thêm thành viên mới";
                passwordNote.classList.add('hidden');
                document.getElementById('userForm').reset();
            }
        }

        function closeUserModal() {
            userModal.classList.add('hidden');
            document.body.classList.remove('modal-active');
        }
    </script>
</body>
</html>