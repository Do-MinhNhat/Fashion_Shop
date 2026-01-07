<!DOCTYPE html>
<html lang="vi">
    <head>
    @yield('head')
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
    <div class="flex h-screen overflow-hidden bg-gray-50">
        <div id="sidebarOverlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black opacity-50 z-20 hidden md:hidden"></div>
        @include('layouts.admin-navigation')
    @yield('content')
    @yield('script')
</body>
    
</html>
