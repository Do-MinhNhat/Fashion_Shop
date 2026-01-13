<aside class="w-full md:w-64 bg-white p-6 shadow-sm h-fit rounded">

    {{-- User Info --}}
    <div class="flex items-center gap-3 mb-8 pb-8 border-b border-gray-100">
        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-xl font-serif">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <div>
            <p class="font-bold">{{ Auth::user()->name }}</p>
            <p class="text-xs text-gray-400">
                Thành viên
            </p>
        </div>
    </div>

    {{-- Menu --}}
    <nav class="space-y-2">
        {{-- Thông tin tài khoản --}}
        <a href="{{ route('user.profile.index') }}"
        class="block px-4 py-2 rounded text-sm font-medium transition
        {{ request()->routeIs('user.profile.index')
                ? 'bg-black text-white'
                : 'text-gray-600 hover:bg-gray-100' }}">
            Thông tin tài khoản
        </a>

        {{-- Lịch sử đơn hàng --}}
        <a href="{{ route('user.profile.order.index') }}"
        class="block px-4 py-2 rounded text-sm transition
        {{ request()->routeIs('user.profile.order.*')
                ? 'bg-black text-white'
                : 'text-gray-600 hover:bg-gray-100' }}">
            Lịch sử đơn hàng
        </a>

        {{-- Sổ địa chỉ --}}
        <a href="{{ route('user.profile.address.index') }}"
        class="block px-4 py-2 rounded text-sm transition
        {{ request()->routeIs('user.profile.address.*')
                ? 'bg-black text-white'
                : 'text-gray-600 hover:bg-gray-100' }}">
            Sổ địa chỉ
        </a>

        {{-- Logout --}}
        <form action="{{ route('logout') }}" method="POST" class="pt-4 mt-4 border-t border-gray-100">
            @csrf
            <button type="submit"
                class="w-full text-left px-4 py-2 text-red-500 hover:bg-red-50 rounded text-sm transition">
                Đăng xuất
            </button>
        </form>

    </nav>
</aside>
