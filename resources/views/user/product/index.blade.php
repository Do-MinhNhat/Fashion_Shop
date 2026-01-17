@extends('user.layouts.app')
@section('title', 'Danh sách sản phảm')
@section('content')

<div class="max-w-[1440px] pt-20 mx-auto flex min-h-screen bg-white">
    <!-- Filter -->
    @include('components.sidebar.product-sidebar-filter')

    <main class="flex-1 p-6 lg:p-10">
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 pb-4 border-b border-gray-100">
            <div>
                <span class="text-xs text-gray-400 uppercase tracking-widest">Kết quả tìm kiếm cho</span>
                <h1 class="text-3xl font-serif mt-1 italic">"Váy dạ hội" <span class="text-lg not-italic text-gray-400 ">(12 kết quả)</span></h1>
            </div>

            <div class="flex gap-4 mt-4 md:mt-0 w-full md:w-auto">
                <button class="lg:hidden flex-1 border border-gray-300 px-4 py-2 text-sm uppercase font-bold flex items-center justify-center gap-2">
                    <i class="fas fa-filter"></i> Lọc
                </button>
                <div class="relative group flex-1 md:flex-none">
                    <select class="appearance-none w-full md:w-48 bg-transparent border-b border-gray-300 py-2 pr-8 text-sm focus:outline-none cursor-pointer">
                        <option>Mới nhất</option>
                        <option>Giá: Thấp đến Cao</option>  
                        <option>Giá: Cao đến Thấp</option>
                        <option>Bán chạy nhất</option>
                    </select>
                    <i class="fas fa-chevron-down absolute right-0 top-3 text-xs text-gray-400 pointer-events-none"></i>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-x-8 gap-y-12">
            <!-- Product List -->
            @foreach ($products as $product)
            @php
                $isNew = $product->created_at->diffInDays(now()) < 30;
                $firstVariant = $product->variants->first();
                $imageUrl = str_starts_with($product->thumbnail, 'http') 
                            ? $product->thumbnail 
                            : asset('storage/' . $product->thumbnail);
            @endphp
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-gray-100">
                        <a href="{{ route('user.product.show', $product->slug) }}" class="block w-full h-full">
                            <img
                                src="{{ $imageUrl }}"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                alt="{{ $product->name }}"
                                loading="lazy"
                            >
                        </a>

                        {{-- ADD TO CART BUTTON --}}
                        <div class="absolute bottom-4 right-4 flex flex-col gap-2 translate-x-12 group-hover:translate-x-0 transition-transform duration-300">
                            @if($firstVariant && $firstVariant->quantity > 0)
                                <form action="{{ route('user.cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="variant_id" value="{{ $firstVariant->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    
                                    <button
                                        type="submit"
                                        class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow hover:bg-black hover:text-white transition" title="Thêm vào giỏ">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </form>

                                <a href="{{ route('user.product.show', $product->slug) }}"
                                    class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow hover:bg-black hover:text-white transition"
                                    title="Xem nhanh"
                                >
                                    <i class="far fa-eye"></i>
                                </a>
                            @else
                                <button disabled class="w-full bg-gray-200/90 text-gray-500 py-3 text-xs uppercase tracking-widest cursor-not-allowed font-bold backdrop-blur-sm">
                                    Hết hàng
                                </button>
                            @endif
                        </div>

                        <div class="absolute top-4 left-4 flex flex-col gap-2">
                            <span class="bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold shadow-sm">New In</span>
                        </div>

                        <div class="absolute top-4 left-4 flex flex-col gap-2 pointer-events-none">
                            @if($isNew)
                                <span class="bg-white px-2 py-1 text-[10px] uppercase tracking-wide font-bold shadow-sm">New In</span>
                            @endif
                            
                            @if($firstVariant && $firstVariant->quantity <= 0)
                                <span class="bg-red-600 text-white px-2 py-1 text-[10px] font-bold uppercase tracking-wider shadow-sm">
                                    Sold Out
                                </span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('user.product.show',$product) }}">
                            <h4 class="font-serif text-lg group-hover:underline decoration-1 underline-offset-4 truncate">{{ $product->name }}</h4>
                            <div class="flex justify-between items-center mt-1">
                                @if ($product->sale_price > 0)
                                <p class="text-red-600 text-sm">
                                    <span class="text-gray-500 text-sm line-through mr-1">
                                        <x-money :value="$product->price" />
                                    </span>
                                    <x-money :value="$product->sale_price" />
                                </p>
                                @else
                                <p class="text-gray-500 text-sm">
                                    <x-money :value="$product->price" />
                                </p>
                                @endif
                            </div>
                        </a>
                        <div class="flex-space-x-1">
                            <span class="w-3 h-3 rounded-full bg-black border border-white"></span>
                            <span class="w-3 h-3 rounded-full bg-blue-900 border border-white"></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-20 flex justify-center">
            <nav class="flex gap-2">
                {{ $products->links() }}
            </nav>
        </div>
    </main>
</div>
@endsection

@push('scripts')
<script>
    const variants = @json($product->variants);

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
