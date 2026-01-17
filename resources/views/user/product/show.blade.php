@extends('user.layouts.app')
@section('title', $product->name)

@section('content')
<div class="pt-20 lg:pt-28 max-w-7xl mx-auto px-6">
    <div class="flex flex-col lg:flex-row lg:min-h-screen">
        <div class="w-full lg:w-3/5 relative bg-gray-50">
            {{-- Ảnh chính --}}
            <img id="main-image"
                src="{{ asset('storage/' . $product->thumbnail) }}"
                class="w-full h-[500px] lg:h-full object-cover"
                alt="{{ $product->name }}"
            >

            {{-- Gallery thumbnails --}}
            @if($product->gallery && count($product->gallery) > 0)
            <div class="absolute bottom-6 left-6 right-6">
                <div class="flex gap-4 overflow-x-auto pb-2 scrollbar-hide">
                    {{-- Thêm ảnh thumbnail chính vào list luôn --}}
                    <img onclick="changeImage(this)"
                         src="{{ asset('storage/' . $product->thumbnail) }}"
                         class="w-20 h-24 object-cover border-2 border-black cursor-pointer bg-white"
                         alt="Thumbnail">

                    @foreach($product->gallery as $img)
                        <img onclick="changeImage(this)"
                             src="{{ asset('storage/' . $img) }}"
                             class="w-20 h-24 object-cover border-2 border-white/50 hover:border-black cursor-pointer transition bg-white"
                             alt="Thumbnail">
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <div class="w-full lg:w-2/5 bg-white px-6 py-8 lg:px-12 lg:py-12">
            <div class="max-w-md mx-auto sticky top-24">
                <span class="text-sm text-gray-400 tracking-widest uppercase block mb-2">
                    {{ $product->category->name ?? 'Collection' }}
                </span>

                <h1 class="text-3xl md:text-4xl font-serif mb-4 text-gray-900">
                    {{ $product->name }}
                </h1>

                <div class="flex items-end gap-4 mb-6">
                    <p class="text-2xl font-light text-black">
                        {{ number_format($product->price) }} ₫
                    </p>
                    @if($product->variants->sum('quantity') > 0)
                        <span class="text-sm text-green-600 mb-1">
                            (Còn hàng)
                        </span>
                    @else
                        <span class="text-sm text-red-600 mb-1">
                            (Hết hàng)
                        </span>
                    @endif
                </div>

                <p class="text-gray-500 text-sm leading-relaxed mb-8 border-b border-gray-100 pb-8">
                    {{ $product->description }}
                </p>

                <form action="{{ route('user.cart.store') }}" method="POST" id="add-to-cart-form">
                    @csrf
                    <input type="hidden" name="variant_id" id="selected-variant-id" required>

                    @php
                        $defaultVariant = $product->variants->where('quantity', '>', 0)->first() ?? $product->variants->first();
                    @endphp

                    {{-- PHẦN MÀU SẮC --}}
                    @if($colors->isNotEmpty())
                    <div class="mb-6">
                        <label class="font-bold text-xs uppercase mb-3 block">
                            Màu sắc: <span id="selected-color-text" class="font-normal text-gray-500">Chọn màu</span>
                        </label>
                        <div class="flex flex-wrap gap-3">
                            @foreach($colors as $color)
                                <label class="cursor-pointer select-none group">
                                    <input type="radio" name="color_opt" value="{{ $color->id }}" 
                                        data-name="{{ $color->name }}" 
                                        class="peer sr-only" 
                                        onchange="updateVariantState()"
                                        {{ ($defaultVariant && $defaultVariant->color_id == $color->id) ? 'checked' : '' }} 
                                    >
                                    
                                    <div class="
                                        w-9 h-9 rounded-full 
                                        flex items-center justify-center 
                                        border border-gray-200
                                        transition-all duration-200
                                        hover:scale-110
                                        peer-checked:ring-2 peer-checked:ring-offset-1 peer-checked:ring-black peer-checked:border-transparent
                                    ">
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- PHẦN KÍCH CỠ --}}
                    @if($sizes->isNotEmpty())
                    <div class="mb-8">
                        <label class="font-bold text-xs uppercase mb-3 block">
                            Kích cỡ: <span id="selected-size-text" class="font-normal text-gray-500">Chọn size</span>
                        </label>
                        <div class="flex flex-wrap gap-3">
                            @foreach($sizes as $size)
                                <label class="cursor-pointer select-none group">
                                    {{-- VALUE LÀ ID --}}
                                    <input type="radio" name="size_opt" value="{{ $size->id }}" 
                                        data-name="{{ $size->name }}"
                                        class="peer sr-only" 
                                        onchange="updateVariantState()"
                                        {{ ($defaultVariant && $defaultVariant->size_id == $size->id) ? 'checked' : '' }}
                                    >
                                    
                                    {{-- HIỂN THỊ LÀ TÊN --}}
                                    <div class="min-w-[40px] px-3 h-10 flex items-center justify-center border border-gray-200 rounded-sm text-sm font-bold bg-white text-gray-900
                                                peer-checked:bg-black peer-checked:text-white peer-checked:border-black
                                                hover:border-black transition-all">
                                        {{ $size->name }}
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="flex gap-4">
                        {{-- Chọn số lượng --}}
                        <div class="flex border border-gray-300 w-32 items-center h-12">
                            <button type="button" class="btn-dec w-10 h-full hover:bg-gray-100 flex items-center justify-center text-gray-600">-</button>
                            <input type="text" name="quantity" value="1" min="1" class="w-12 text-center border-none text-sm bg-transparent p-0 focus:ring-0 h-full text-gray-900 font-medium appearance-none m-0"/>
                            <button type="button" class="btn-inc w-10 h-full hover:bg-gray-100 flex items-center justify-center text-gray-600">+</button>
                        </div>

                        {{-- Nút Thêm Giỏ --}}
                        <button type="submit" 
                            class="flex-1 bg-gray-900 text-white uppercase tracking-widest text-xs font-bold hover:bg-black transition h-12"
                        >
                            Thêm vào giỏ
                        </button>

                        {{-- Nút Yêu thích --}}
                        <button type="button" class="w-12 h-12 border border-gray-300 flex items-center justify-center text-gray-600 hover:text-red-500 hover:border-red-500 transition">
                            <i class="far fa-heart text-lg"></i>
                        </button>
                    </div>
                    
                    <p id="variant-error" class="text-red-500 text-xs mt-2 hidden"></p>
                </form>

                <div class="mt-8 pt-8 border-t border-gray-100 space-y-4">
                    <div class="flex items-center gap-3 text-sm text-gray-600">
                        <i class="fa-solid fa-truck-fast w-5"></i>
                        <span>Miễn phí vận chuyển đơn từ 500k</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm text-gray-600">
                        <i class="fa-solid fa-rotate-left w-5"></i>
                        <span>Đổi trả miễn phí trong 30 ngày</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- REVIEW SECTION --}}
    <div class="py-16 border-t border-gray-100 mt-16">
        <h3 class="font-serif text-2xl mb-8">Đánh giá khách hàng</h3>
        <div class="bg-gray-50 p-8 text-center text-gray-500">
            Chức năng đánh giá đang được cập nhật...
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const variants = @json($product->variants);

    // 1. Logic đổi ảnh
    function changeImage(element) {
        document.getElementById('main-image').src = element.src;
        document.querySelectorAll('.gallery-thumb').forEach(el => el.classList.remove('border-black'));
    }

    // 2. Logic Update Variant ID
    function updateVariantState() {
        // 1. Lấy ID từ input đang được chọn
        const colorInput = document.querySelector('input[name="color_opt"]:checked');
        const sizeInput = document.querySelector('input[name="size_opt"]:checked');

        const selectedColorId = colorInput ? parseInt(colorInput.value) : null;
        const selectedSizeId = sizeInput ? parseInt(sizeInput.value) : null;
        
        // 2. Cập nhật Text hiển thị (Dùng data-name để lấy tên)
        if(colorInput) document.getElementById('selected-color-text').innerText = colorInput.dataset.name;
        if(sizeInput) document.getElementById('selected-size-text').innerText = sizeInput.dataset.name;

        // 3. Tìm Variant trong list JSON
        const hiddenInput = document.getElementById('selected-variant-id');
        hiddenInput.value = ''; 

        if (selectedColorId && selectedSizeId) {
            // SO SÁNH color_id và size_id THAY VÌ color/size string
            const match = variants.find(v => v.color_id === selectedColorId && v.size_id === selectedSizeId);

            if (match && match.quantity > 0) {
                hiddenInput.value = match.id;
            } 
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        updateVariantState();
    });

    // 3. Tăng giảm số lượng
    document.querySelector('.btn-inc').addEventListener('click', function() {
        let input = this.previousElementSibling;
        input.value = parseInt(input.value) + 1;
    });

    document.querySelector('.btn-dec').addEventListener('click', function() {
        let input = this.nextElementSibling;
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    });

    // 4. CHẶN SUBMIT: Quan trọng (Thay thế cho việc disable nút)
    document.getElementById('add-to-cart-form').addEventListener('submit', function(e) {
        const variantId = document.getElementById('selected-variant-id').value;
        
        if (!variantId) {
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Sản phẩm tạm hết hàng',
                text: 'Phân loại bạn chọn hiện không còn hàng hoặc chưa được chọn.',
                confirmButtonColor: '#000',
            });
        }
    });

    // 5. Thông báo Session (Thành công/Thất bại từ Controller)
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        });
    @endif
</script>
@endpush