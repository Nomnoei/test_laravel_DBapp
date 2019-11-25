<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
     

        @include('layout.pages.head')
    </head>
    <body>
           
        @include('layout.pages.nav')

        @yield('content')
        
        @include('layout.pages.footer')
    </body>
</html>
