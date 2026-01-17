@props(['product'])

<div class="group cursor-pointer">
    <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
        <a href="{{ route('user.product.show', $product->slug) }}">
            <img
                src="{{ $product->thumbnail }}"
                class="absolute inset-0 w-full h-full object-cover transition-transform group-hover:scale-105"
                alt="{{ $product->name }}"
            >
        </a>

        {{-- Add to cart --}}
        <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition bg-white/90">
            <button class="w-full bg-black text-white py-3 text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">
                Thêm vào giỏ
            </button>
        </div>

        {{-- BADGE --}}
        @if($product->view >= 1000)
            <span class="absolute top-4 left-4 bg-black text-white px-2 py-1 text-xs">
                Best Seller
            </span>
        @elseif($product->rating >= 4.5)
            <span class="absolute top-4 left-4 bg-white px-2 py-1 text-xs">
                Featured
            </span>
        @elseif($product->id >= ($maxProductId - 10))
            <span class="absolute top-4 left-4 bg-white px-2 py-1 text-xs">
                New
            </span>
        @endif
    </div>

    <div class="text-center">
        <a href="{{ route('user.product.show', $product->slug) }}">
            <h4 class="font-serif text-lg group-hover:underline">{{ $product->name }}</h4>
            <p class="text-gray-500 text-sm mt-1">{{ number_format($product->price) }} ₫</p>
            <div class="flex justify-center space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <span class="w-3 h-3 rounded-full bg-red-800 border border-gray-300"></span>
                <span class="w-3 h-3 rounded-full bg-black border border-gray-300"></span>
            </div>
        </a>
    </div>
</div>
