<header class="h-16 bg-white border-b flex items-center justify-between px-6 shadow-sm z-10">
    <div class="flex items-center gap-4">
        <button onclick="toggleSidebar()" class="md:hidden text-gray-600 hover:text-blue-600 focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
        </button>
        <div class="text-lg font-semibold text-gray-700">@yield('subtitle')</div>
    </div>

    <div class="flex items-center gap-4">
        <button class="relative text-gray-500 hover:text-blue-500 transition-colors">
            <i class="fas fa-bell text-xl"></i>
            <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
        </button>
        <div class="h-8 w-px bg-gray-200 mx-2"></div>
        <div class="flex items-center gap-3 cursor-pointer hover:bg-gray-50 p-2 rounded-lg transition-colors">
            <img src="https://ui-avatars.com/api/?name=Admin+User&background=0D8ABC&color=fff" class="w-8 h-8 rounded-full">
            <div class="hidden md:block text-sm">
                <p class="font-medium text-gray-700">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-500">{{ Auth::user()->role->name }}</p>
            </div>
            <i class="fas fa-chevron-down text-xs text-gray-400 hidden md:block"></i>
        </div>
    </div>
</header>