@extends('admin.layouts.app')
@section('title', 'Quản lý Đơn hàng')
@section('subtitle', '')

@section('content')
    <div class="flex-1 flex flex-col md:flex-row overflow-hidden">
        <div class="flex-1 flex flex-col bg-gray-50 border-r border-gray-200 overflow-hidden">
            <div class="p-4 bg-white border-b border-gray-200 shadow-sm z-10">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-600">
                        <i class="fas fa-barcode text-lg"></i>
                    </span>
                    <input type="text" class="w-full py-3 pl-10 pr-12 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 shadow-sm" placeholder="Tìm sản phẩm (F3) hoặc quét mã vạch...">
                    <button class="absolute inset-y-0 right-0 px-4 text-gray-500 hover:text-blue-600 font-medium text-sm">
                        Tìm kiếm
                    </button>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto p-4">
                <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-gray-500 uppercase bg-gray-50 border-b">
                            <tr>
                                <th class="px-4 py-3 w-10">#</th>
                                <th class="px-4 py-3">Tên sản phẩm</th>
                                <th class="px-4 py-3 w-32 text-center">Đơn vị</th>
                                <th class="px-4 py-3 w-32 text-center">Số lượng</th>
                                <th class="px-4 py-3 w-40 text-right">Đơn giá nhập</th>
                                <th class="px-4 py-3 w-40 text-right">Thành tiền</th>
                                <th class="px-4 py-3 w-10"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-blue-50 group transition-colors">
                                <td class="px-4 py-3 text-gray-400">1</td>
                                <td class="px-4 py-3">
                                    <div class="font-medium text-gray-800">Áo Thun Cotton Nam - Size L</div>
                                    <div class="text-xs text-gray-500">SKU: AT-001-L | Tồn: 15</div>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <select class="bg-transparent border-none focus:ring-0 text-sm text-center w-full">
                                        <option>Cái</option>
                                        <option>Lố (12)</option>
                                    </select>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center border border-gray-300 rounded overflow-hidden bg-white">
                                        <button class="px-2 py-1 hover:bg-gray-100 text-gray-600">-</button>
                                        <input type="number" value="10" class="w-12 text-center border-none focus:ring-0 p-1 text-sm font-semibold">
                                        <button class="px-2 py-1 hover:bg-gray-100 text-gray-600">+</button>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <input type="text" value="85,000" class="w-full text-right border border-transparent hover:border-gray-300 focus:border-blue-500 rounded px-1 py-1 bg-transparent focus:bg-white transition-colors" onclick="this.select()">
                                </td>
                                <td class="px-4 py-3 text-right font-bold text-gray-800">850,000</td>
                                <td class="px-4 py-3 text-center">
                                    <button class="text-gray-300 hover:text-red-500 transition-colors"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>

                            <tr class="hover:bg-blue-50 group transition-colors">
                                <td class="px-4 py-3 text-gray-400">2</td>
                                <td class="px-4 py-3">
                                    <div class="font-medium text-gray-800">Quần Jeans Slimfit - Size 30</div>
                                    <div class="text-xs text-gray-500">SKU: QJ-022-30 | Tồn: 5</div>
                                </td>
                                <td class="px-4 py-3 text-center">Cái</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center border border-gray-300 rounded overflow-hidden bg-white">
                                        <button class="px-2 py-1 hover:bg-gray-100 text-gray-600">-</button>
                                        <input type="number" value="5" class="w-12 text-center border-none focus:ring-0 p-1 text-sm font-semibold">
                                        <button class="px-2 py-1 hover:bg-gray-100 text-gray-600">+</button>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <input type="text" value="250,000" class="w-full text-right border border-transparent hover:border-gray-300 focus:border-blue-500 rounded px-1 py-1 bg-transparent focus:bg-white transition-colors">
                                </td>
                                <td class="px-4 py-3 text-right font-bold text-gray-800">1,250,000</td>
                                <td class="px-4 py-3 text-center">
                                    <button class="text-gray-300 hover:text-red-500 transition-colors"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú nhập hàng</label>
                    <textarea class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm bg-white" rows="2" placeholder="Ví dụ: Hàng nhập bổ sung tết..."></textarea>
                </div>
            </div>
        </div>

        <div class="w-full md:w-[350px] lg:w-[400px] bg-white border-l border-gray-200 flex flex-col shadow-xl z-20">
            <div class="flex-1 overflow-y-auto p-4 space-y-4">
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="font-bold text-gray-700 text-sm uppercase"><i class="fas fa-truck mr-2"></i>Nhà cung cấp</h3>
                        <button class="text-blue-600 hover:text-blue-800 text-xs font-medium"><i class="fas fa-plus"></i> Thêm mới</button>
                    </div>
                    
                    <div class="relative mb-3">
                        <select class="w-full p-2.5 bg-white border border-gray-300 rounded text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                            <option value="">-- Chọn nhà cung cấp --</option>
                            <option value="1" selected>Công ty TNHH May Mặc Việt</option>
                            <option value="2">Xưởng sản xuất A</option>
                        </select>
                    </div>
                    
                    <div class="text-xs text-gray-600 space-y-1 pl-1">
                        <p><i class="fas fa-phone w-4 text-gray-400"></i> 0901.234.567</p>
                        <p><i class="fas fa-map-marker-alt w-4 text-gray-400"></i> Hà Đông, Hà Nội</p>
                        <p class="text-red-500 font-medium mt-2">Công nợ hiện tại: -5.000.000 ₫</p>
                    </div>
                </div>

                <div class="space-y-3 pt-2">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Tổng số lượng</span>
                        <span class="font-medium">15</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Tổng tiền hàng</span>
                        <span class="font-medium">2,100,000 ₫</span>
                    </div>
                    
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-600">Chiết khấu</span>
                        <div class="flex items-center w-28">
                            <input type="text" class="w-full text-right p-1 border-b border-gray-300 focus:border-blue-500 outline-none text-sm" value="0">
                            <span class="ml-1 text-gray-500">₫</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-600">Thuế VAT</span>
                        <div class="flex items-center gap-1">
                            <input type="checkbox" id="vat" class="text-blue-600 rounded">
                            <label for="vat" class="text-gray-500 text-xs">10%</label>
                        </div>
                    </div>

                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-600">Chi phí nhập khác</span>
                        <div class="flex items-center w-28">
                            <input type="text" class="w-full text-right p-1 border-b border-gray-300 focus:border-blue-500 outline-none text-sm" value="0">
                        </div>
                    </div>

                    <div class="border-t border-dashed border-gray-300 my-3"></div>

                    <div class="flex justify-between items-end">
                        <span class="text-base font-bold text-gray-800">Cần trả NCC</span>
                        <span class="text-xl font-bold text-blue-600">2,100,000 ₫</span>
                    </div>

                    <div class="bg-blue-50 p-3 rounded border border-blue-100 mt-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-medium text-blue-800">Tiền trả lần này</span>
                        </div>
                        <input type="text" class="w-full p-2 text-right border border-blue-200 rounded text-blue-900 font-bold focus:ring-2 focus:ring-blue-500 outline-none" value="0">
                        <div class="mt-2 flex justify-between text-xs text-blue-600">
                            <span>Còn nợ lại:</span>
                            <span class="font-bold">2,100,000 ₫</span>
                        </div>
                    </div>
                    
                    <div class="mt-2">
                        <label class="block text-xs font-medium text-gray-500 mb-1">Phương thức thanh toán</label>
                        <div class="flex gap-2">
                            <button class="flex-1 py-1.5 px-2 text-xs border border-blue-600 bg-blue-50 text-blue-700 rounded font-medium">Tiền mặt</button>
                            <button class="flex-1 py-1.5 px-2 text-xs border border-gray-300 bg-white text-gray-600 rounded hover:bg-gray-50">Chuyển khoản</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-gray-50 border-t border-gray-200 space-y-3">
                <button class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-bold shadow-lg transition-transform active:scale-95 flex items-center justify-center">
                    <i class="fas fa-check-circle mr-2"></i> HOÀN THÀNH
                </button>
                <div class="flex gap-3">
                    <button class="flex-1 py-2 px-3 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 text-sm">
                        <i class="fas fa-save mr-1"></i> Lưu nháp
                    </button>
                    <button class="flex-1 py-2 px-3 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 text-sm">
                        <i class="fas fa-print mr-1"></i> In phiếu
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const inputs = document.querySelectorAll('input[type="text"]');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.select();
            });
        });
    </script>
@endpush