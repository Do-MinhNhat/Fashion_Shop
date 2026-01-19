@extends('user.layouts.app')
@section('title', $viewData['title'])

@section('content')

<div class="max-w-6xl mx-auto pt-20 pb-10 px-4 flex flex-col md:flex-row gap-8 bg-gray-50  text-gray-800">
    <!-- Sidebar -->
    @include('components.sidebar.profile-sidebar')

    <main class="flex-1 bg-white p-8 shadow-sm">
        <div class="flex flex-col md:flex-row justify-between items-end mb-8 border-b border-gray-100 pb-4 gap-4">
            <div>
                <h2 class="text-xl  font-bold">Sổ địa chỉ</h2>
                <p class="text-sm text-gray-400 mt-1">Quản lý địa chỉ nhận hàng của bạn.</p>
            </div>
            <button onclick="openModal()" class="bg-black text-white px-6 py-3 text-xs font-bold uppercase tracking-widest hover:bg-gray-800 transition flex items-center gap-2">
                <i class="fas fa-plus"></i> Thêm địa chỉ mới
            </button>
        </div>

        <!-- Address -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
            <div class="relative border-2 border-black p-6 group">
                <span class="absolute -top-3 left-6 bg-black text-white text-[10px] font-bold uppercase px-3 py-1 tracking-widest">
                    Mặc định
                </span>
                
                <div class="flex justify-between items-start mb-4 mt-2">
                    <div>
                        <h3 class="font-bold text-lg">Nguyễn Văn A</h3>
                        <p class="text-sm text-gray-500 mt-1">(+84) 90 123 4567</p>
                    </div>
                    <div class="flex gap-3">
                        <button class="text-xs font-bold text-gray-400 hover:text-black uppercase tracking-wide border-b border-transparent hover:border-black transition">Sửa</button>
                    </div>
                </div>

                <div class="text-sm text-gray-600 leading-relaxed mb-6">
                    <p>Số 123, Đường Lê Lợi</p>
                    <p>Phường Bến Thành, Quận 1</p>
                    <p>TP. Hồ Chí Minh, Việt Nam</p>
                </div>

                <div class="pt-4 border-t border-dashed border-gray-300 flex justify-between items-center">
                    <span class="text-xs text-green-600 font-bold flex items-center gap-2">
                        <i class="fas fa-check-circle"></i> Đang sử dụng
                    </span>
                </div>
            </div>

            <div class="relative border border-gray-200 p-6 hover:border-gray-400 transition duration-300">
                <span class="absolute top-6 right-6 text-[10px] font-bold text-gray-400 uppercase tracking-widest border border-gray-200 px-2 py-1">
                    Văn phòng
                </span>

                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-bold text-lg">Nguyễn Văn A</h3>
                        <p class="text-sm text-gray-500 mt-1">(+84) 91 888 9999</p>
                    </div>
                </div>

                <div class="text-sm text-gray-600 leading-relaxed mb-6">
                    <p>Tòa nhà Bitexco Financial Tower</p>
                    <p>Số 2 Hải Triều, Bến Nghé, Quận 1</p>
                    <p>TP. Hồ Chí Minh, Việt Nam</p>
                </div>

                <div class="pt-4 border-t border-gray-100 flex justify-between items-center gap-4">
                    <button class="text-xs text-gray-400 hover:text-black font-medium transition">Thiết lập mặc định</button>
                    <div class="flex gap-3">
                        <button class="text-xs font-bold text-gray-400 hover:text-black uppercase tracking-wide border-b border-transparent hover:border-black transition">Sửa</button>
                        <span class="text-gray-300">|</span>
                        <button class="text-xs font-bold text-red-400 hover:text-red-600 uppercase tracking-wide border-b border-transparent hover:border-red-600 transition">Xóa</button>
                    </div>
                </div>
            </div>

            <div class="relative border border-gray-200 p-6 hover:border-gray-400 transition duration-300">
                <span class="absolute top-6 right-6 text-[10px] font-bold text-gray-400 uppercase tracking-widest border border-gray-200 px-2 py-1">
                    Nhà Bố Mẹ
                </span>

                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-bold text-lg">Nguyễn Thị B (Mẹ)</h3>
                        <p class="text-sm text-gray-500 mt-1">(+84) 98 765 4321</p>
                    </div>
                </div>

                <div class="text-sm text-gray-600 leading-relaxed mb-6">
                    <p>Số 45, Ngõ 102 Trường Chinh</p>
                    <p>Phường Khương Thượng, Quận Đống Đa</p>
                    <p>Hà Nội, Việt Nam</p>
                </div>

                <div class="pt-4 border-t border-gray-100 flex justify-between items-center gap-4">
                    <button class="text-xs text-gray-400 hover:text-black font-medium transition">Thiết lập mặc định</button>
                    <div class="flex gap-3">
                        <button class="text-xs font-bold text-gray-400 hover:text-black uppercase tracking-wide border-b border-transparent hover:border-black transition">Sửa</button>
                        <span class="text-gray-300">|</span>
                        <button class="text-xs font-bold text-red-400 hover:text-red-600 uppercase tracking-wide border-b border-transparent hover:border-red-600 transition">Xóa</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form AddAddress -->
        <div id="address-modal" class="fixed inset-0 z-50 hidden">
            <div id="modal-backdrop" class="absolute inset-0 bg-black/40 backdrop-blur-sm transition-opacity opacity-0"></div>
            <div class="absolute inset-0 flex items-center justify-center p-4">
                <div id="modal-panel" class="bg-white w-full max-w-2xl shadow-2xl transform scale-95 opacity-0 transition-all duration-300 flex flex-col max-h-[90vh]">
                    
                    <div class="flex justify-between items-center p-6 border-b border-gray-100">
                        <h3 class=" text-2xl font-bold">Thêm địa chỉ mới</h3>
                        <button onclick="closeModal()" class="text-gray-400 hover:text-red-500 transition text-xl px-2">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="p-8 overflow-y-auto custom-scrollbar">
                        <form class="space-y-6">
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500">Họ và tên</label>
                                    <input type="text" placeholder="Ví dụ: Nguyễn Văn A" class="w-full border border-gray-200 p-3 text-sm focus:outline-none focus:border-black transition placeholder-gray-300">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500">Số điện thoại</label>
                                    <input type="tel" placeholder="Ví dụ: 0901234567" class="w-full border border-gray-200 p-3 text-sm focus:outline-none focus:border-black transition placeholder-gray-300">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="space-y-2">
                                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500">Tỉnh / Thành phố</label>
                                    <div class="relative">
                                        <select class="w-full border border-gray-200 p-3 text-sm focus:outline-none focus:border-black transition appearance-none bg-white cursor-pointer">
                                            <option>Chọn Tỉnh/Thành</option>
                                            <option>Hồ Chí Minh</option>
                                            <option>Hà Nội</option>
                                        </select>
                                        <i class="fas fa-chevron-down absolute right-3 top-4 text-xs text-gray-400 pointer-events-none"></i>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500">Quận / Huyện</label>
                                    <div class="relative">
                                        <select class="w-full border border-gray-200 p-3 text-sm focus:outline-none focus:border-black transition appearance-none bg-white cursor-pointer">
                                            <option>Chọn Quận/Huyện</option>
                                        </select>
                                        <i class="fas fa-chevron-down absolute right-3 top-4 text-xs text-gray-400 pointer-events-none"></i>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500">Phường / Xã</label>
                                    <div class="relative">
                                        <select class="w-full border border-gray-200 p-3 text-sm focus:outline-none focus:border-black transition appearance-none bg-white cursor-pointer">
                                            <option>Chọn Phường/Xã</option>
                                        </select>
                                        <i class="fas fa-chevron-down absolute right-3 top-4 text-xs text-gray-400 pointer-events-none"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs font-bold uppercase tracking-widest text-gray-500">Địa chỉ cụ thể</label>
                                <textarea rows="2" placeholder="Số nhà, tên đường, tòa nhà..." class="w-full border border-gray-200 p-3 text-sm focus:outline-none focus:border-black transition placeholder-gray-300 resize-none"></textarea>
                            </div>

                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 pt-2">
                                
                                <div class="flex gap-4">
                                    <label class="cursor-pointer">
                                        <input type="radio" name="address_type" class="hidden peer" checked>
                                        <span class="px-4 py-2 border border-gray-200 text-xs uppercase font-bold text-gray-400 peer-checked:bg-black peer-checked:text-white peer-checked:border-black transition hover:border-black">
                                            <i class="fas fa-home mr-1"></i> Nhà riêng
                                        </span>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="address_type" class="hidden peer">
                                        <span class="px-4 py-2 border border-gray-200 text-xs uppercase font-bold text-gray-400 peer-checked:bg-black peer-checked:text-white peer-checked:border-black transition hover:border-black">
                                            <i class="fas fa-building mr-1"></i> Văn phòng
                                        </span>
                                    </label>
                                </div>

                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox" class="w-4 h-4 border-gray-300 rounded-none focus:ring-0 accent-black text-black">
                                    <span class="text-sm font-medium text-gray-600 group-hover:text-black">Đặt làm địa chỉ mặc định</span>
                                </label>
                            </div>

                        </form>
                    </div>

                    <div class="p-6 border-t border-gray-100 flex justify-end gap-4 bg-gray-50">
                        <button onclick="closeModal()" class="px-6 py-3 text-xs font-bold uppercase tracking-widest text-gray-500 hover:text-black hover:underline">Hủy bỏ</button>
                        <button class="bg-black text-white px-8 py-3 text-xs font-bold uppercase tracking-widest hover:bg-gray-800 transition shadow-lg">Lưu địa chỉ</button>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>
@endsection

@push('scripts')
    <script>
    const modal = document.getElementById('address-modal');
    const modalBackdrop = document.getElementById('modal-backdrop');
    const modalPanel = document.getElementById('modal-panel');

    function openModal() {
        modal.classList.remove('hidden');
        
        setTimeout(() => {
            modalBackdrop.classList.remove('opacity-0');
            modalPanel.classList.remove('opacity-0', 'scale-95');
            modalPanel.classList.add('opacity-100', 'scale-100');
        }, 10);
    }

    function closeModal() {
        modalBackdrop.classList.add('opacity-0');
        modalPanel.classList.remove('opacity-100', 'scale-100');
        modalPanel.classList.add('opacity-0', 'scale-95');

        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    modalBackdrop.addEventListener('click', closeModal);
</script>

@endpush
