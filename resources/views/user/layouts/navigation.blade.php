@php
$menus = [
    'Nam' => [
        ['label' => 'Áo nam', 'params' => ['gender' => 'men', 'type' => 'ao']],
        ['label' => 'Quần nam', 'params' => ['gender' => 'men', 'type' => 'quan']],
        ['label' => 'Giày nam', 'params' => ['gender' => 'men', 'type' => 'giay']],
    ],
    'Nữ' => [
        ['label' => 'Váy', 'params' => ['gender' => 'women', 'type' => 'vay']],
        ['label' => 'Áo nữ', 'params' => ['gender' => 'women', 'type' => 'ao']],
        ['label' => 'Phụ kiện nữ', 'params' => ['gender' => 'women', 'type' => 'phu-kien']],
    ],
    'Phụ kiện' => [
        ['label' => 'Túi', 'params' => ['category' => 'tui']],
        ['label' => 'Nón', 'params' => ['category' => 'non']],
        ['label' => 'Thắt lưng', 'params' => ['category' => 'that-lung']],
    ],
];
@endphp

{{-- Category --}}
    <div class="hidden lg:flex items-center justify-center space-x-10 text-xs uppercase tracking-widest font-semibold text-black p-2 shadow">
        @foreach ($menus as $title => $items)
            <div class="relative group">
                {{-- Parent --}}
                <button class="hover:text-black transition flex items-center gap-1">
                    {{ $title }}
                    <i class="fa-solid fa-chevron-down text-xs"></i>
                </button>

                {{-- Dropdown --}}
                <div class="absolute left-0 top-full mt-4 w-56 bg-white shadow-xl rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                    @foreach ($items as $item)
                        <a href="{{ route('user.product.index', $item['params']) }}"
                        class="block px-5 py-3 text-xs text-black hover:bg-gray-100 hover:text-black transition">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach

        {{-- Collection --}}
        <a href="{{ route('user.product.index', ['sale' => 1]) }}" class="text-red-500 hover:text-red-600 transition relative group">
            Bộ sưu tập
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-red-500 transition-all group-hover:w-full"></span>
        </a>

        {{-- Sale --}}
        <a href="{{ route('user.product.index', ['sale' => 1]) }}" class="text-red-500 hover:text-red-600 transition relative group">
            Sale
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-red-500 transition-all group-hover:w-full"></span>
        </a>
    </div>