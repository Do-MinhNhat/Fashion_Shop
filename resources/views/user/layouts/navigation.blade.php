<header class="relative">
    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            {{-- Mobile --}}
            <button class="lg:hidden">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>

            {{-- Logo --}}
            <a href="{{ route('user.home.index') }}" class="text-3xl font-serif font-bold tracking-widest uppercase">
                CDHN.
            </a>

            {{-- Category (Desktop) --}}
            <div class="hidden lg:flex space-x-8 text-sm uppercase tracking-widest font-bold text-gray-500">
                <a href="{{ route('user.product.index', ['gender' => 'men']) }}" class="hover:text-black transition-colors relative group">
                    Nam
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-black transition-all group-hover:w-full"></span>
                </a>
                <a href="{{ route('user.product.index', ['gender' => 'women']) }}" class="hover:text-black transition-colors relative group">
                    Nữ
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-black transition-all group-hover:w-full"></span>
                </a>
                <a href="{{ route('user.product.index', ['category' => 'giay']) }}" class="hover:text-black transition-colors relative group">
                    Giày
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-black transition-all group-hover:w-full"></span>
                </a>
                <a href="{{ route('user.product.index') }}" class="hover:text-black transition-colors relative group">
                    Bộ sưu tập
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-black transition-all group-hover:w-full"></span>
                </a>
                <a href="{{ route('user.product.index') }}" class="hover:text-red-600 text-red-500 transition-colors relative group">
                    Sale
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-black transition-all group-hover:w-full"></span>
                </a>
            </div>

            {{-- Right --}}
            <div class="flex space-x-6 items-center">
                {{-- Search --}}
                <div class="relative flex items-center" id="search-container">
                    <form action="{{ route('user.product.index') }}" method="GET">
                        <input type="text"
                            name="q"
                            id="search-input"
                            placeholder="Tìm kiếm sản phẩm..."
                            class="w-0 opacity-0 border-b border-black bg-transparent outline-none text-sm transition-all duration-300 pr-8 py-2 absolute right-0 top-0 focus:w-64 focus:opacity-100 placeholder-gray-400"
                        >
                    </form>

                    <button id="search-btn" class="hover:scale-110 transition-transform">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>

                {{-- Cart --}}
                <a href="{{ route('user.cart.index') }}" class="relative hover:scale-110 transition-transform p-1">
                    <i class="fa-solid fa-bag-shopping text-lg"></i>
                    {{-- Logic check cart count --}}
                    @if(session('cart_count') > 0)
                        <span class="absolute -top-1 -right-1 bg-black text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">
                            {{ session('cart_count') }}
                        </span>
                    @endif
                </a>

                {{-- Account --}}
                <a href="{{ Auth::check() ? route('user.profile.index') : route('login') }}"
                class="hover:scale-110 transition-transform">
                    <i class="fa-regular fa-user"></i>
                </a>

                <div class="hidden md:flex items-center gap-3 ml-2 pl-4 border-l border-gray-200">
                    @guest
                        {{-- Chưa đăng nhập --}}
                        <a href="{{ route('login') }}"
                        class="text-xs font-bold uppercase tracking-widest hover:text-gray-600 transition-colors whitespace-nowrap">
                            Đăng nhập
                        </a>

                        <a href="{{ route('register') }}"
                        class="text-xs font-bold uppercase tracking-widest bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition-colors shadow-lg shadow-gray-200 whitespace-nowrap">
                            Đăng ký
                        </a>
                    @endguest

                    @auth
                        {{-- Đã đăng nhập --}}
                        <span class="text-xs font-bold uppercase tracking-widest">
                            {{ Auth::user()->name }}
                        </span>
                    @endauth
                </div>


            </div>
        </div>

        {{-- MOBILE MENU --}}
        <div id="mobile-menu" class="fixed inset-0 z-40 bg-white transform -translate-x-full transition-transform duration-300 lg:hidden flex flex-col pt-24 px-6 space-y-6">
            <a href="{{ route('user.product.index', ['gender' => 'men']) }}" class="text-xl font-serif font-bold border-b pb-2">Nam</a>
            <a href="{{ route('user.product.index', ['gender' => 'women']) }}" class="text-xl font-serif font-bold border-b pb-2">Nữ</a>
            <a href="{{ route('user.product.index', ['category' => 'giay']) }}" class="text-xl font-serif font-bold border-b pb-2">Giày</a>
            <a href="{{ route('user.product.index') }}" class="text-xl font-serif font-bold border-b pb-2">Bộ sưu tập</a>
            <a href="{{ route('login') }}" class="text-center w-full py-3 border border-black uppercase font-bold text-sm tracking-widest mt-4">Đăng nhập</a>
            <a href="{{ route('register') }}" class="text-center w-full py-3 bg-black text-white uppercase font-bold text-sm tracking-widest">Đăng ký ngay</a>
        </div>
    </nav>
</header>

@push('scripts')
<script>
    // Search Logic
    const searchBtn = document.getElementById('search-btn');
    const searchInput = document.getElementById('search-input');
    const searchContainer = document.getElementById('search-container');
    let isSearchOpen = false;

    searchBtn.addEventListener('click', (e) => {
        if (!isSearchOpen || searchInput.value === '') {
            e.preventDefault();
            if (!isSearchOpen) {
                searchInput.classList.remove('w-0', 'opacity-0');
                searchInput.classList.add('w-48', 'md:w-64', 'opacity-100');
                searchInput.focus();
                isSearchOpen = true;
            } else {
                // If open and empty, close it
                searchInput.classList.remove('w-48', 'md:w-64', 'opacity-100');
                searchInput.classList.add('w-0', 'opacity-0');
                isSearchOpen = false;
            }
        }
        // If open and has value, allow form submit (default action)
    });

    document.addEventListener('click', (e) => {
        if (!searchContainer.contains(e.target) && isSearchOpen) {
            if(searchInput.value === '') {
                searchInput.classList.remove('w-48', 'md:w-64', 'opacity-100');
                searchInput.classList.add('w-0', 'opacity-0');
                isSearchOpen = false;
            }
        }
    });

    // Mobile Menu Logic
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    let isMenuOpen = false;

    mobileBtn.addEventListener('click', () => {
        if (!isMenuOpen) {
            mobileMenu.classList.remove('-translate-x-full');
            mobileBtn.innerHTML = '<i class="fa-solid fa-xmark text-xl"></i>';
        } else {
            mobileMenu.classList.add('-translate-x-full');
            mobileBtn.innerHTML = '<i class="fa-solid fa-bars text-xl"></i>';
        }
        isMenuOpen = !isMenuOpen;
    });
</script>
@endpush