@extends('admin.layouts.app')
@section('title', 'Quản lý Đơn hàng')
@section('subtitle', '')

@section('content')

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
                                    <button onclick="toggleModal()" class="text-gray-500 hover:text-blue-600" title="Xem chi tiết"><i class="fas fa-eye"></i></button>
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
                                    <button onclick="toggleModal()"" class="text-gray-500 hover:text-blue-600"><i class="fas fa-eye"></i></button>
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
                                    <button onclick="toggleModal()" class="text-gray-500 hover:text-blue-600"><i class="fas fa-eye"></i></button>
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

    <div id="orderModal" class="fixed inset-0 z-50 hidden transition-opacity duration-300" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm" onclick="toggleModal()"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-xl bg-gray-50 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">
                    <div class="bg-white px-6 py-4 border-b border-gray-200 flex items-center justify-between sticky top-0 z-20">
                        <div class="flex items-center gap-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Đơn hàng #ORD-2024-001</h3>
                                <p class="text-xs text-gray-500">Đặt lúc: 14:30 - 12/01/2024</p>
                            </div>
                            <span class="inline-flex items-center rounded-full bg-yellow-50 px-3 py-1 text-xs font-bold text-yellow-700 ring-1 ring-inset ring-yellow-600/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-600 mr-1.5"></span> Chờ xử lý
                            </span>
                            <span class="inline-flex items-center rounded border border-gray-200 bg-gray-50 px-2 py-0.5 text-xs font-medium text-gray-600">
                                <i class="fas fa-money-bill-wave mr-1"></i> COD (Thu hộ)
                            </span>
                        </div>
                        <button onclick="toggleModal()" class="text-gray-400 hover:text-gray-600 transition-colors bg-gray-100 w-8 h-8 rounded-full flex items-center justify-center">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="p-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 space-y-6">
                            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sản phẩm</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Đơn giá</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">SL</th>
                                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="h-12 w-12 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                        <img class="h-full w-full object-cover object-center" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=100" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">Nike Air Max Red</div>
                                                        <div class="text-xs text-gray-500">Size: 42 | Màu: Đỏ</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">2.500.000 ₫</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900 font-medium">1</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-900 font-bold">2.500.000 ₫</td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="h-12 w-12 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                        <img class="h-full w-full object-cover object-center" src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?w=100" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">Áo Thun Basic</div>
                                                        <div class="text-xs text-gray-500">Size: L | Màu: Trắng</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">300.000 ₫</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900 font-medium">2</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-900 font-bold">600.000 ₫</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="flex justify-end">
                                <div class="w-full sm:w-80 bg-white rounded-lg border border-gray-200 p-4 shadow-sm space-y-3">
                                    <div class="flex justify-between text-sm text-gray-600">
                                        <span>Tạm tính (3 sp):</span>
                                        <span class="font-medium">3.100.000 ₫</span>
                                    </div>
                                    <div class="flex justify-between text-sm text-gray-600">
                                        <span>Phí vận chuyển:</span>
                                        <span class="font-medium">35.000 ₫</span>
                                    </div>
                                    <div class="flex justify-between text-sm text-green-600">
                                        <span>Giảm giá (Voucher):</span>
                                        <span class="font-medium">- 50.000 ₫</span>
                                    </div>
                                    <div class="border-t border-dashed border-gray-300 pt-3 flex justify-between items-center">
                                        <span class="font-bold text-gray-900">Tổng cộng:</span>
                                        <span class="text-xl font-bold text-blue-600">3.085.000 ₫</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Ghi chú nội bộ (Chỉ Admin thấy)</label>
                                <div class="flex gap-2">
                                    <input type="text" class="flex-1 rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 bg-white" placeholder="Ví dụ: Khách hẹn giao sau 5h chiều...">
                                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-600 px-4 py-2 rounded-md text-sm font-medium border border-gray-300">Lưu</button>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-1 space-y-6">
                            
                            <div class="bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
                                <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4 border-b pb-2">Thông tin khách hàng</h4>
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">NV</div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900">Nguyễn Văn A</p>
                                        <p class="text-xs text-gray-500">Khách hàng thân thiết</p>
                                    </div>
                                </div>
                                <div class="space-y-3 text-sm text-gray-600">
                                    <div class="flex items-start gap-3">
                                        <i class="fas fa-envelope mt-1 text-gray-400 w-4"></i>
                                        <span class="break-all">nguyenvana@gmail.com</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-phone text-gray-400 w-4"></i>
                                        <span>0988.123.456</span>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <i class="fas fa-map-marker-alt mt-1 text-gray-400 w-4"></i>
                                        <span>123 Đường Cầu Giấy, Phường Quan Hoa, Quận Cầu Giấy, Hà Nội</span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
                                <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4 border-b pb-2">Lịch sử đơn hàng</h4>
                                
                                <div class="relative pl-4 border-l-2 border-gray-200 space-y-6">
                                    <div class="relative">
                                        <div class="absolute -left-[21px] top-1 h-3 w-3 rounded-full bg-gray-300 ring-4 ring-white"></div>
                                        <p class="text-xs text-gray-500 mb-0.5">14:30 - 12/01/2024</p>
                                        <p class="text-sm font-medium text-gray-900">Đơn hàng được tạo</p>
                                        <p class="text-xs text-gray-500">Bởi: Khách hàng</p>
                                    </div>
                                    </div>
                                
                                <button class="w-full mt-4 text-xs text-blue-600 hover:underline">Xem toàn bộ lịch sử</button>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 sticky bottom-0 z-20">
                        <button class="inline-flex items-center justify-center rounded-md bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 w-full sm:w-auto">
                            <i class="fas fa-print mr-2"></i> In hóa đơn
                        </button>
                        
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <div class="relative flex-1 sm:flex-none">
                                <select class="block w-full rounded-md border-0 py-2 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6">
                                    <option>Chờ xử lý</option>
                                    <option>Đã xác nhận</option>
                                    <option>Đang giao hàng</option>
                                    <option>Hoàn thành</option>
                                    <option class="text-red-600">Đã hủy</option>
                                </select>
                            </div>
                            
                            <button class="inline-flex items-center justify-center rounded-md bg-blue-600 px-6 py-2 text-sm font-bold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 w-full sm:w-auto">
                                Cập nhật
                            </button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        function toggleModal() {
            const modal = document.getElementById('orderModal');
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                // Prevent body scroll
                document.body.style.overflow = 'hidden'; 
            } else {
                modal.classList.add('hidden');
                // Enable body scroll
                document.body.style.overflow = 'auto';
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
@endpush