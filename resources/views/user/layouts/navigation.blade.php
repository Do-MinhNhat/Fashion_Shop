   <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 transition-all duration-300">
       <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
           <button class="lg:hidden"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
               </svg></button>
           <!-- Logo -->
           <a href="/Client/index.html" class="text-3xl font-serif font-bold tracking-widest uppercase">CDHN.</a>

           <!-- Category -->
           <div class="hidden lg:flex space-x-8 text-sm uppercase tracking-wid之est font-bold text-gray-500">
               <a href="/Client/Product/ProductList.html" class="hover:text-black transition-colors">Nam</a>
               <a href="/Client/Product/ProductList.html" class="hover:text-black transition-colors">Nữ</a>
               <a href="/Client/Product/ProductList.html" class="hover:text-black transition-colors">Giày</a>
               <a href="/Client/Product/ProductList.html" class="hover:text-black transition-colors">Bộ sưu tập</a>
               <a href="/Client/Product/ProductList.html" class="hover:text-black transition-colors text-red-500">Sale</a>
           </div>

           <div class="flex space-x-6 items-center">
               <!-- Search -->
               <div class="relative flex items-center" id="search-container">
                   <input type="text"
                       id="search-input"
                       placeholder="Tìm kiếm sản phẩm..."
                       class="w-0 opacity-0 border-b border-black bg-transparent outline-none text-sm transition-all duration-500 ease-in-out pr-8 py-2 absolute right-0 focus:w-64 focus:opacity-100 z-0 placeholder-gray-400">
                   <button id="search-btn" class="z-10 hover:scale-110 transition-transform pl-2">
                       <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                       </svg>
                   </button>
                   <button id="close-search-btn" class="hidden absolute right-0 z-20 text-xs uppercase font-bold hover:text-red-500">
                       <i class="fas fa-times"></i>
                   </button>
               </div>

               <!-- Account -->
               <button class="hover:scale-110 transition-transform">
                   <a href="Profile/Profile.html">
                       <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                       </svg>
                   </a>
               </button>

               <!-- Cart -->
               <div class="relative group cursor-pointer">
                   <button class="hover:scale-110 transition-transform">
                       <a href="/Client/Cart/Cart.html" class="hover:text-gray-600">
                           <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                           </svg>
                       </a>
                   </button>
                   <span class="absolute -top-2 -right-2 bg-black text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center">2</span>
               </div>
           </div>
       </div>
   </nav>
