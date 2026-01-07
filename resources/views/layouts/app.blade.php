<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
            @yield('head')
</head>

<body>
    </header>
            @include('layouts.navigation')
            @include('layouts.slideshow')
    </header>
            @yield('content')
            
            @include('layouts.footer')
            @yield('script')
</body>
           
</html>
