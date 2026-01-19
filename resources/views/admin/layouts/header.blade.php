<header class="h-16 bg-[#0f1117]/95 backdrop-blur-md border-b border-white/5 flex items-center justify-between px-6 z-20 sticky top-0 transition-all duration-300">
    {{-- LEFT: TOGGLE & TITLE --}}
    <div class="flex items-center gap-5">
        {{-- Nút Toggle Sidebar (Mobile) --}}
        <button onclick="toggleSidebar()" class="lg:hidden text-gray-400 hover:text-white transition-colors focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
        </button>

        {{-- Page Title --}}
        <h1 class="text-lg font-medium text-white tracking-wide">
            @yield('subtitle', 'Tổng quan')
        </h1>
    </div>

    {{-- RIGHT: ACTIONS --}}
    <div class="flex items-center gap-2">
        {{-- Notification Bell --}}
        <button class="relative w-10 h-10 flex items-center justify-center rounded-full text-gray-400 hover:text-white hover:bg-white/5 transition-all group">
            <i class="fas fa-bell text-lg group-hover:animate-swing"></i> {{-- Icon lắc nhẹ khi hover --}}
            
            {{-- Red Dot với hiệu ứng Ping --}}
            <span class="absolute top-2.5 right-2.5 flex h-2.5 w-2.5">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-rose-500 border-2 border-[#0f1117]"></span>
            </span>
        </button>

        <div class="h-6 w-px bg-white/10 mx-2"></div>

        {{-- User Profile --}}
        <div x-data="{ open: false }" class="relative">
            {{-- Trigger --}}
            <button @click="open = !open" @click.outside="open = false"
                class="flex items-center gap-3 cursor-pointer py-1.5 px-2 rounded-lg hover:bg-white/5 transition-all border border-transparent hover:border-white/5 group"
            >
                {{-- Avatar --}}
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=6366f1&color=fff&size=128" 
                         class="w-8 h-8 rounded-full object-cover ring-2 ring-white/10 group-hover:ring-indigo-500/50 transition-all">
                    {{-- Status Dot --}}
                    <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full ring-2 ring-[#0f1117] bg-green-500"></span>
                </div>

                {{-- Text Info --}}
                <div class="hidden md:block text-left">
                    <p class="text-sm font-medium text-white leading-none mb-1">{{ Auth::user()->name }}</p>
                    <p class="text-[11px] text-gray-400 uppercase tracking-wider font-bold">{{ Auth::user()->role->name ?? 'Admin' }}</p>
                </div>

                {{-- Chevron Icon --}}
                <i class="fas fa-chevron-down text-[10px] text-gray-500 transition-transform duration-200 hidden md:block" : class="open ? 'rotate-180' : ''"></i>
            </button>

            {{-- Dropdown Menu --}}
            <div x-show="open" 
                x-cloak
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                class="absolute right-0 mt-2 w-48 bg-[#1a1d26] border border-white/10 rounded-xl shadow-2xl py-1 z-50 overflow-hidden ring-1 ring-black/50"
            >
                <div class="px-4 py-3 border-b border-white/5 mb-1">
                    <p class="text-xs text-gray-400">Đăng nhập bởi</p>
                    <p class="text-sm font-medium text-white truncate">{{ Auth::user()->email }}</p>
                </div>

                <a href="#" class="flex items-center px-4 py-2.5 text-sm text-gray-300 hover:bg-white/5 hover:text-white transition-colors">
                    <i class="far fa-user w-5 text-gray-500"></i> Hồ sơ cá nhân
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-sm text-gray-300 hover:bg-white/5 hover:text-white transition-colors">
                    <i class="fas fa-cog w-5 text-gray-500"></i> Cài đặt
                </a>
                
                <div class="h-px bg-white/5 my-1"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-2.5 text-sm text-rose-400 hover:bg-rose-500/10 hover:text-rose-300 transition-colors">
                        <i class="fas fa-sign-out-alt w-5"></i> Đăng xuất
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>