@props(['product'])

@php
    // 1. Kiểm tra sản phẩm mới (trong vòng 30 ngày)
    $isNew = $product->created_at->diffInDays(now()) < 30;

    // 2. Lấy biến thể đầu tiên để làm mặc định cho nút "Thêm vào giỏ"
    $firstVariant = $product->variants->first();

    // 3. Xử lý URL ảnh (Link HTTP hoặc Storage Local)
    $imageUrl = str_starts_with($product->thumbnail, 'http') 
                ? $product->thumbnail 
                : asset('storage/' . $product->thumbnail);
@endphp

<div class="group relative">
    {{-- IMAGE CONTAINER --}}
    <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100 w-full">
        <a href="{{ route('user.product.show', $product->slug) }}" class="block w-full h-full">
            <img
                src="{{ $imageUrl }}"
                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                alt="{{ $product->name }}"
                loading="lazy"
            >
        </a>

        {{-- ADD TO CART BUTTON --}}
        <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition duration-300 z-10">
            @if($firstVariant && $firstVariant->quantity > 0)
                <form action="{{ route('user.cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="variant_id" value="{{ $firstVariant->id }}">
                    <input type="hidden" name="quantity" value="1">
                    
                    <button type="submit" class="w-full bg-black text-white font-bold py-3 text-xs uppercase tracking-widest hover:bg-gray-700 hover:text-white transition-colors shadow-lg backdrop-blur-sm">
                        Thêm giỏ hàng
                    </button>
                </form>
            @else
                <button disabled class="w-full bg-gray-200/90 text-gray-500 py-3 text-xs uppercase tracking-widest cursor-not-allowed font-bold backdrop-blur-sm">
                    Hết hàng
                </button>
            @endif
        </div>

        {{-- BADGES --}}
        <div class="absolute top-3 left-3 flex flex-col gap-2 pointer-events-none">
            @if($product->view >= 1000)
                <span class="bg-black text-white px-2 py-1 text-[10px] font-bold uppercase tracking-wider">
                    Best Seller
                </span>
            @elseif($product->view >= 200)
                <span class="bg-yellow-500 text-white px-2 py-1 text-[10px] font-bold uppercase tracking-wider">
                    Hot
                </span>
            @endif

            @if($isNew)
                <span class="bg-white text-black px-2 py-1 text-[10px] font-bold uppercase tracking-wider shadow-sm">
                    New
                </span>
            @endif
            
            @if($firstVariant && $firstVariant->quantity <= 0)
                 <span class="bg-red-600 text-white px-2 py-1 text-[10px] font-bold uppercase tracking-wider shadow-sm">
                    Sold Out
                </span>
            @endif
        </div>
    </div>

    {{-- INFO --}}
    <div class="text-center">
        <a href="{{ route('user.product.show', $product->slug) }}">
            <h4 class="font-serif text-base text-gray-900 group-hover:underline transition-colors line-clamp-1 px-2">
                {{ $product->name }}
            </h4>
            
            <p class="text-gray-900 font-light text-sm mt-1">
                {{ number_format($product->price, 0, ',', '.') }} ₫
            </p>
        </a>
        
        {{-- Hiển thị các chấm màu --}}
        @if($product->variants->isNotEmpty())
            <div class="flex justify-center items-center gap-1.5 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 h-4">
                @foreach($product->variants->unique('color')->take(4) as $variant)
                    @php
                        $colorCode = $colorMap[strtolower($variant->color)] ?? $variant->color;
                        $borderClass = strtolower($variant->color) === 'white' || strtolower($variant->color) === 'trắng' ? 'border-gray-300' : 'border-transparent';
                    @endphp
                    
                    <span class="w-3 h-3 rounded-full border {{ $borderClass }} shadow-sm" 
                          style="background-color: {{ $colorCode }};"
                          title="{{ $variant->color }}">
                    </span>
                @endforeach

                @if($product->variants->unique('color')->count() > 4)
                    <span class="text-[10px] text-gray-400 leading-none">+</span>
                @endif
            </div>
        @else
            <div class="h-4 mt-2"></div>
        @endif
    </div>
</div>