@extends('user.layouts.app')
@section('title', $viewData['title'])

@section('content')
<div class="pt-20 lg:pt-28 max-w-7xl mx-auto px-6">
    <div class="flex flex-col lg:flex-row lg:h-screen lg:overflow-hidden">
        <!-- IMAGE -->
        <div class="w-full lg:w-3/5 lg:h-full relative bg-gray-100">
            <img
                src="{{ asset('storage/' . $viewData['product']->thumbnail) }}"
                class="absolute inset-0 w-full h-full object-cover"
            >

            @if($viewData['product']->gallery)
            <div class="absolute bottom-6 left-6 right-6">
                <div class="grid grid-cols-4 gap-4 max-w-75">
                    @foreach($viewData['product']->gallery as $img)
                        <img
                            src="{{ asset('storage/' . $img) }}"
                            class="w-full aspect-[3/4] object-cover border-2 border-white/50 hover:border-white cursor-pointer transition"
                        >
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- DETAILS -->
        <div class="w-full lg:w-2/5 h-full bg-white px-6 py-6 lg:px-12 lg:py-12">
            <div class="max-w-md mx-auto">
                <span class="text-sm text-gray-400 tracking-widest uppercase">
                    {{ $viewData['product']->category->name ?? 'Collection' }}
                </span>

                <h1 class="text-4xl font-serif mt-2 mb-4">
                    {{ $viewData['product']->name }}
                </h1>

                <p class="text-2xl font-light mb-6">
                    {{ number_format($viewData['product']->price) }} ₫
                </p>

                <p class="text-gray-500 text-sm leading-relaxed mb-8">
                    {{ $viewData['product']->description }}
                </p>

                <!-- ADD TO CART -->
                <form action="" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label class="text-xs uppercase font-bold tracking-wide block mb-2">Màu sắc</label>
                        <div class="flex gap-3">
                            @foreach(['black', 'red', 'beige'] as $color)
                                <label>
                                    <input type="radio" name="color" value="{{ $color }}" required class="peer hidden cursor-pointer">
                                    <div class="w-8 h-8 rounded-full border-2 border-gray-300 peer-checked:ring-2 peer-checked:ring-offset-2"
                                        style="background-color: {{ $color === 'beige' ? '#f5f5dc' : $color }};">
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="text-xs uppercase font-bold tracking-wide block mb-2">Kích cỡ</label>
                        <div class="flex gap-3">
                            @foreach(['S','M','L'] as $size)
                                <label>
                                    <input type="radio" name="size" value="{{ $size }}" required class="peer hidden cursor-pointer">
                                    <div class="w-10 h-10 border border-gray-300 flex items-center justify-center text-sm
                                                peer-checked:bg-black peer-checked:text-white peer-checked:border-black transition">
                                        {{ $size }}
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex border border-gray-300 w-32 items-center">
                            <button type="button" class="btn-dec w-10 h-12 hover:bg-gray-100">-</button>
                            <input type="number" name="qty" value="1" min="1" oninput="this.value = Math.max(this.value, 1)" class="w-full text-center border-none focus:ring-0 h-full"/>
                            <button type="button" class="btn-inc w-10 h-12 hover:bg-gray-100">+</button>
                        </div>

                        <button type="submit" class="flex-1 bg-black text-white uppercase tracking-widest text-xs font-bold hover:bg-gray-800 transition py-4">
                            Thêm vào giỏ
                        </button>

                        <button type="button" class="w-12 border border-gray-300 flex items-center justify-center hover:text-red-500 transition">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-20 border-t border-gray-100">
        <h3 class="text-2xl font-serif mb-6">Đánh giá khách hàng (2)</h3>
        <div></div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-inc')) {
                const parent = e.target.closest('div');
                const input = parent.querySelector('input[name="qty"]');
                input.value = parseInt(input.value) + 1;
            }

            if (e.target.classList.contains('btn-dec')) {
                const parent = e.target.closest('div');
                const input = parent.querySelector('input[name="qty"]');
                const value = parseInt(input.value);
                if (value > 1) input.value = value - 1;
            }
        });
    </script>
@endpush
