<nav class="flex-1 flex flex-col h-full bg-[#0f1117] border-r border-white/5 py-8 select-none overflow-hidden font-sans text-sm">
    
    {{-- PHẦN 1: DASHBOARD --}}
    <div class="px-4 mb-8">
        @php $isActive = request()->routeIs('admin.home.*'); @endphp
        <a href="{{ route('admin.home.index') }}" 
           class="group flex items-center px-4 py-3.5 rounded-xl transition-all duration-300 ease-out relative overflow-hidden
           {{ $isActive 
              ? 'bg-white/10 text-white shadow-lg shadow-black/20 ring-1 ring-white/10' 
              : 'text-gray-400 hover:bg-white/5 hover:text-white' 
           }}">
            
            {{-- Hiệu ứng Glow nhẹ khi Active --}}
            @if($isActive)
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 shadow-[0_0_10px_rgba(59,130,246,0.6)]"></div>
            @endif

            <i class="fas fa-chart-line w-9 text-lg transition-colors duration-300 {{ $isActive ? 'text-blue-400' : 'group-hover:text-blue-400' }}"></i>
            <span class="font-medium tracking-wide">Dashboard</span>
        </a>
    </div>

    {{-- LABEL NHÓM --}}
    <div class="px-8 mb-4 flex items-center justify-between">
        <span class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em]">Cửa hàng</span>
        <span class="h-px w-6 bg-white/10"></span>
    </div>

    <div class="space-y-2 px-4 flex-1">
        {{-- BÁN HÀNG --}}
        @php 
            $isOrderGroup = request()->routeIs('admin.order.*') || request()->routeIs('admin.ship.*');
        @endphp
        <div x-data="{ open: {{ $isOrderGroup ? 'true' : 'false' }} }" class="mt-2">
            <button @click="open = !open" 
                    class="w-full flex items-center justify-between px-4 py-3.5 rounded-xl transition-all duration-300 group
                    {{ $isOrderGroup ? 'bg-white/5 text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                <div class="flex items-center">
                    <i class="fas fa-shopping-cart w-9 text-lg transition-colors {{ $isOrderGroup ? 'text-teal-400' : 'group-hover:text-teal-400' }}"></i>
                    <span class="font-medium">Bán hàng</span>
                </div>
                <i class="fas fa-chevron-right text-[10px] transition-transform duration-300 {{ $isOrderGroup ? 'text-white' : 'text-gray-600' }}" 
                   :class="open ? 'rotate-90' : ''"></i>
            </button>

            <div x-show="open" 
                x-cloak
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="mt-2 space-y-1 pl-12 pr-2 relative"
            >
                <div class="absolute left-8 top-2 bottom-2 w-px bg-white/10"></div>

                <a href="{{ route('admin.order.index') }}" 
                   class="flex items-center py-2.5 px-3 rounded-lg transition-all duration-200 relative group/item
                   {{ request()->routeIs('admin.order.*') ? 'text-white font-medium bg-white/10' : 'text-gray-500 hover:text-white hover:bg-white/5' }}">
                   <span class="w-1.5 h-1.5 rounded-full mr-3 transition-all 
                        {{ request()->routeIs('admin.order.*') ? 'bg-teal-400 shadow-[0_0_8px_rgba(45,212,191,0.5)]' : 'bg-gray-600 group-hover/item:bg-gray-400' }}">
                   </span>
                   Danh sách đơn hàng
                </a>
                
                <a href="{{ route('admin.ship.index') }}" 
                   class="flex items-center py-2.5 px-3 rounded-lg transition-all duration-200 relative group/item
                   {{ request()->routeIs('admin.ship.*') ? 'text-white font-medium bg-white/10' : 'text-gray-500 hover:text-white hover:bg-white/5' }}">
                   <span class="w-1.5 h-1.5 rounded-full mr-3 transition-all 
                        {{ request()->routeIs('admin.ship.*') ? 'bg-teal-400 shadow-[0_0_8px_rgba(45,212,191,0.5)]' : 'bg-gray-600 group-hover/item:bg-gray-400' }}">
                   </span>
                   Vận chuyển & Giao nhận
                </a>
            </div>
        </div>

        {{-- SẢN PHẨM & Phiếu nhập --}}
        @php 
            $isProductGroup = request()->routeIs('admin.product.*') || request()->routeIs('admin.import.*');
        @endphp
        <div x-data="{ open: {{ $isProductGroup ? 'true' : 'false' }} }">
            {{-- Nút Dropdown --}}
            <button @click="open = !open" 
                class="w-full flex items-center justify-between px-4 py-3.5 rounded-xl transition-all duration-300 group
                {{ $isProductGroup 
                    ? 'bg-white/5 text-white' 
                    : 'text-gray-400 hover:bg-white/5 hover:text-white' 
                }}"
            >
                <div class="flex items-center">
                    <i class="fas fa-box w-9 text-lg transition-colors {{ $isProductGroup ? 'text-purple-400' : 'group-hover:text-purple-400' }}"></i>
                    <span class="font-medium">Kho hàng</span>
                </div>
                <i class="fas fa-chevron-right text-[10px] transition-transform duration-300 {{ $isProductGroup ? 'text-white' : 'text-gray-600' }}" : class="open ? 'rotate-90' : ''"></i>
            </button>

            {{-- Menu Con --}}
            <div x-show="open" 
                x-cloak
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="mt-2 space-y-1 pl-12 pr-2 relative"
            >
                <div class="absolute left-8 top-2 bottom-2 w-px bg-white/10"></div>
                {{-- Danh sách sản phẩm --}}
                <a href="{{ route('admin.product.index') }}" 
                   class="flex items-center py-2.5 px-3 rounded-lg transition-all duration-200 relative group/item
                   {{ request()->routeIs('admin.product.*') 
                      ? 'text-white font-medium bg-white/10' 
                      : 'text-gray-500 hover:text-white hover:bg-white/5' }}"
                >
                   {{-- Dấu chấm active --}}
                   <span class="w-1.5 h-1.5 rounded-full mr-3 transition-all 
                        {{ request()->routeIs('admin.product.*') ? 'bg-purple-500 shadow-[0_0_8px_rgba(168,85,247,0.5)]' : 'bg-gray-600 group-hover/item:bg-gray-400' }}">
                   </span>
                   Danh sách sản phẩm
                </a>
                
                {{-- Phiếu nhập --}}
                <a href="{{ route('admin.import.index') }}" 
                   class="flex items-center py-2.5 px-3 rounded-lg transition-all duration-200 relative group/item
                   {{ request()->routeIs('admin.import.*') 
                      ? 'text-white font-medium bg-white/10' 
                      : 'text-gray-500 hover:text-white hover:bg-white/5' }}">
                   
                    <span class="w-1.5 h-1.5 rounded-full mr-3 transition-all 
                        {{ request()->routeIs('admin.import.*') ? 'bg-purple-500 shadow-[0_0_8px_rgba(168,85,247,0.5)]' : 'bg-gray-600 group-hover/item:bg-gray-400' }}">
                    </span>
                    Phiếu nhập
                </a>
            </div>
        </div>
        
        {{-- KHÁCH HÀNG --}}
        <div class="mt-2">
            @php $isActive = request()->routeIs('admin.user.*'); @endphp
            <a href="{{ route('admin.user.index') }}" 
               class="group flex items-center px-4 py-3.5 rounded-xl transition-all duration-300 ease-out relative overflow-hidden
               {{ $isActive 
                  ? 'bg-white/10 text-white shadow-lg shadow-black/20 ring-1 ring-white/10' 
                  : 'text-gray-400 hover:bg-white/5 hover:text-white' 
               }}">
                @if($isActive)
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-pink-500 shadow-[0_0_10px_rgba(236,72,153,0.6)]"></div>
                @endif
                <i class="fas fa-users w-9 text-lg transition-colors duration-300 {{ $isActive ? 'text-pink-400' : 'group-hover:text-pink-400' }}"></i>
                <span class="font-medium tracking-wide">Khách hàng</span>
            </a>
        </div>

        <div class="mt-2">
            @php $isActive = request()->routeIs('admin.slideshow.*'); @endphp
            <a href="{{ route('admin.slideshow.index') }}" 
               class="group flex items-center px-4 py-3.5 rounded-xl transition-all duration-300 ease-out relative overflow-hidden
               {{ $isActive 
                  ? 'bg-white/10 text-white shadow-lg shadow-black/20 ring-1 ring-white/10' 
                  : 'text-gray-400 hover:bg-white/5 hover:text-white' 
               }}">

                @if($isActive)
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-pink-500 shadow-[0_0_10px_rgba(236,72,153,0.6)]"></div>
                @endif
                <i class="fa-solid fa-images w-9 text-lg transition-colors duration-300 {{ $isActive ? 'text-pink-400' : 'group-hover:text-pink-400' }}"></i>
                <span class="font-medium tracking-wide">Banner</span>
            </a>
        </div>
    </div>

    {{-- CÀI ĐẶT --}}
    <div class="px-4 pb-6 mt-auto">
        <div class="h-px w-full bg-gradient-to-r from-transparent via-white/10 to-transparent mb-6"></div>
        
        @php $isActive = request()->routeIs('admin.setting.*'); @endphp
        <a href="{{ route('admin.setting.index') }}" 
           class="group flex items-center px-4 py-3.5 rounded-xl transition-all duration-300
           {{ $isActive 
              ? 'bg-white/10 text-white' 
              : 'text-gray-400 hover:bg-white/5 hover:text-white' 
           }}">
            <i class="fas fa-cog mr-3 text-lg transition-all duration-300 {{ $isActive ? 'text-gray-200' : 'group-hover:text-white group-hover:rotate-90' }}"></i>
            <span class="font-medium tracking-wide">Cấu hình hệ thống</span>
        </a>
    </div>
</nav>
