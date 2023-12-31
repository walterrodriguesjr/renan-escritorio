<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        
        {{-- CDN do fontawesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- Incluir o bootstrap css -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Incluir o custom css -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        
        
        <!-- Incluir o jsgrid css -->
        <link rel="stylesheet" href="{{ asset('css/jsgrid.min.css') }}">
        
        <!-- Incluir o js grid theme css -->
        <link rel="stylesheet" href="{{ asset('css/jsgrid-theme.min.css') }}">

        <!-- Incluir o selectize css -->
        <link rel="stylesheet" href="{{ asset('css/selectize.bootstrap5.css') }}">

        <!-- Estilos do AdminLTE -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css">

         <!-- Incluir o jQuery -->
         <script src="{{ asset('js/jquery.min.js') }}"></script>

         <!-- Incluir o selectize js -->
        <script src="{{ asset('js/selectize.min.js') }}"></script>

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
         <!-- Incluir o jsgrid js -->

         <!-- Incluir o bootstrap js -->
        <script src="{{ asset('js/jsgrid.min.js') }}"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        @include('layouts.sidebar')
        <div class="min-h-screen bg-gray-100" style="margin-left: 80px">
            @include('layouts.navigation')
            
            

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow mt-5">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
                
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>


