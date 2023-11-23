<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>





 

<body>



     <div class="flex flex-row">
        <div class="basis-1/6">
        
        @include('layout.nav')
        
        
        </div>




        <div class="basis-5/6">
            
            {{$slot }}
        
            @yield('content')
        
        </div>
       
      </div>
     

</body>

</html>
