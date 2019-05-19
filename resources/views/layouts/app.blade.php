<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
@include('layouts.header')
    <div id="app">
        
        <br><br><br>&nbps;

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('layouts.footer')
</body>
</html>
