@extends('user.layouts.app')
@section('title', $viewData['title'])

@section('content')

<div class="max-w-6xl mx-auto pt-20 pb-10 px-4 flex flex-col md:flex-row gap-8 bg-gray-50 text-gray-800">
    @include('components.sidebar.profile-sidebar')

    <main class="flex-1 bg-white p-8 shadow-sm">
        <h2 class="text-xl font-serif font-bold mb-6">Đơn hàng của tôi</h2>
        
        <div class="space-y-6">
            <div class="border border-gray-100 rounded-lg p-6 hover:shadow-md transition">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="font-bold text-lg">#ORD-8823</span>
                        <p class="text-xs text-gray-400">Đặt ngày: 15/05/2026</p>
                    </div>
                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-bold">Đang giao hàng</span>
                </div>
                <div class="flex gap-4 border-t border-b border-gray-50 py-4 mb-4">
                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=100" class="w-16 h-20 object-cover bg-gray-100 rounded">
                    <img src="https://images.unsplash.com/photo-1539008835657-9e8e9680c956?q=80&w=100" class="w-16 h-20 object-cover bg-gray-100 rounded">
                    <div class="flex items-center text-gray-400 text-sm ml-2">+2 sản phẩm khác</div>
                </div>
                <div class="flex justify-between items-center">
                    <p class="text-sm font-medium">Tổng tiền: <span class="text-lg font-bold">4.200.000 ₫</span></p>
                    <div class="flex gap-2">
                        <button onclick="toggleModal()" class="px-4 py-2 text-xs border border-gray-300 hover:bg-gray-50 transition-colors">Chi tiết</button>
                        <button class="px-4 py-2 text-xs bg-black text-white hover:bg-gray-800 transition-colors">Mua lại</button>
                    </div>
                </div>
            </div>
            
            <div class="border border-gray-100 rounded-lg p-6 opacity-75">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="font-bold text-lg">#ORD-1029</span>
                        <p class="text-xs text-gray-400">Đặt ngày: 01/02/2026</p>
                    </div>
                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-bold">Đã giao</span>
                </div>
                <div class="flex gap-4 border-t border-b border-gray-50 py-4 mb-4">
                    <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=100" class="w-16 h-20 object-cover bg-gray-100 rounded">
                </div>
                <div class="flex justify-between items-center">
                    <p class="text-sm font-medium">Tổng tiền: <span class="text-lg font-bold">850.000 ₫</span></p>
                    <button class="px-4 py-2 text-xs border border-gray-300 hover:bg-gray-50">Đánh giá</button>
                </div>
            </div>
        </div>
    </main>
</div>

{{-- MODAL AREA --}}
<div id="orderModal" class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden p-4">
    
    {{-- Backdrop (Click ra ngoài để đóng) --}}
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="toggleModal()"></div>
    
    {{-- Modal Content --}}
    <div class="relative w-full max-w-2xl rounded-2xl bg-white shadow-2xl transition-all transform scale-100">
        
        {{-- Header --}}
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Chi tiết đơn hàng</h2>
                <p class="text-sm text-gray-500">Mã đơn: <span class="font-mono text-black font-bold">#ORD-8829</span></p>
            </div>
            {{-- Close Button (Thêm onclick) --}}
            <button onclick="toggleModal()" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-gray-200 hover:text-black transition-colors">
                <i class="fas fa-times"></i>
            </button>
        </div>

        {{-- Scrollable Body --}}
        <div class="p-6 overflow-y-auto max-h-[75vh] custom-scrollbar">
            
            {{-- Progress Bar --}}
            <div class="mb-8">
                <div class="flex items-center justify-between relative">
                    <div class="absolute left-0 top-1/2 w-full h-1 bg-gray-200 -z-10"></div>
                    
                    <div class="flex flex-col items-center gap-2 bg-white px-2">
                        <div class="w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center text-xs font-bold ring-4 ring-white">
                            <i class="fas fa-check"></i>
                        </div>
                        <span class="text-xs font-bold text-green-600">Đã đặt</span>
                    </div>

                    <div class="flex flex-col items-center gap-2 bg-white px-2">
                        <div class="w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center text-xs font-bold ring-4 ring-white">
                            <i class="fas fa-box"></i>
                        </div>
                        <span class="text-xs font-bold text-green-600">Đã đóng gói</span>
                    </div>

                    <div class="flex flex-col items-center gap-2 bg-white px-2">
                        <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs font-bold ring-4 ring-blue-100 ring-offset-2">
                            <i class="fas fa-truck"></i>
                        </div>
                        <span class="text-xs font-bold text-blue-600">Đang giao</span>
                    </div>

                    <div class="flex flex-col items-center gap-2 bg-white px-2">
                        <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-400 flex items-center justify-center text-xs font-bold ring-4 ring-white">
                            <i class="fas fa-home"></i>
                        </div>
                        <span class="text-xs font-medium text-gray-400">Đã nhận</span>
                    </div>
                </div>
                <div class="mt-4 bg-blue-50 text-blue-800 text-xs p-3 rounded-lg flex items-start gap-2">
                    <i class="fas fa-info-circle mt-0.5"></i>
                    <div>
                        <span class="font-bold">Cập nhật mới nhất:</span> Đơn hàng đang trên đường đến bạn. Shipper sẽ gọi trước khi giao.
                    </div>
                </div>
            </div>

            {{-- Info Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                    <h3 class="text-sm font-bold text-gray-800 mb-2 uppercase tracking-wide">Địa chỉ nhận hàng</h3>
                    <p class="text-sm font-bold text-gray-900">Nguyễn Văn A</p>
                    <p class="text-sm text-gray-600 mt-1">0912.345.678</p>
                    <p class="text-sm text-gray-600 mt-1">123 Cầu Giấy, Hà Nội</p>
                </div>
                <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                    <h3 class="text-sm font-bold text-gray-800 mb-2 uppercase tracking-wide">Thanh toán</h3>
                    <p class="text-sm text-gray-600">Phương thức: <span class="font-medium text-black">Thanh toán khi nhận hàng (COD)</span></p>
                    <p class="text-sm text-gray-600 mt-1">Trạng thái: <span class="font-bold text-orange-500">Chưa thanh toán</span></p>
                </div>
            </div>

            {{-- Products --}}
            <div class="space-y-4 mb-6">
                <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wide">Sản phẩm (2)</h3>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-lg bg-gray-100 overflow-hidden border border-gray-200">
                            <img src="https://via.placeholder.com/64" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 text-sm">Áo sơ mi Slimfit</p>
                            <p class="text-xs text-gray-500 mt-0.5">Màu: Trắng | Size: L</p>
                            <p class="text-xs text-gray-500 mt-0.5">x 2</p>
                        </div>
                    </div>
                    <div class="text-sm font-bold text-gray-900">700.000 ₫</div>
                </div>
            </div>

            {{-- Summary --}}
            <div class="border-t border-gray-100 pt-4 space-y-2">
                <div class="flex justify-between text-sm text-gray-500">
                    <span>Tổng tiền hàng</span>
                    <span>700.000 ₫</span>
                </div>
                <div class="flex justify-between text-sm text-gray-500">
                    <span>Phí vận chuyển</span>
                    <span>30.000 ₫</span>
                </div>
                <div class="flex justify-between text-sm text-green-600">
                    <span>Giảm giá</span>
                    <span>- 70.000 ₫</span>
                </div>
                <div class="flex justify-between items-center text-lg font-bold text-black pt-2">
                    <span>Thành tiền</span>
                    <span class="text-blue-600">660.000 ₫</span>
                </div>
            </div>

        </div>

        {{-- Footer Actions --}}
        <div class="p-5 border-t border-gray-100 flex gap-3">
            <button class="flex-1 py-3 bg-white border border-gray-300 text-gray-700 font-bold rounded-lg hover:bg-gray-50 transition-colors">
                Liên hệ hỗ trợ
            </button>
            <button class="flex-1 py-3 bg-black text-white font-bold rounded-lg hover:bg-gray-800 transition-colors shadow-lg shadow-gray-200">
                Mua lại đơn này
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function toggleModal() {
        const modal = document.getElementById('orderModal');
        
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }
</script>
@endpush