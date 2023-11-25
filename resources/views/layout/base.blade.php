<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <title>@yield('title')</title> --}}
    <title>{{$title ?? config('app.name')}}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
   <script src="{{ asset('js/app.js')}}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>





 

<body>



     <div class="flex flex-row">
        <div class="basis-1/6">
        
        @include('layout.nav')
        
        
        </div>




        <div class="basis-5/6">
            
           
        
            @yield('content')
        
        </div>
       
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

      <script>
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr('#start-date', {
            // Ajoutez des options personnalisées si nécessaire
        });

        flatpickr('#end-date', {
            // Ajoutez des options personnalisées si nécessaire
        });
    });
</script>
</body>

</html>
