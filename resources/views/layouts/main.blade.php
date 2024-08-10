<!doctype html>
<html lang="en">
    @include('includes.head')
    
    <body>

        
    
        <main>

            @include('includes.nav')

            @yield('content')
            
        @include('includes.footer')
        @yield('team')

@include('includes.js')

</body>
</html>
