<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <style>
            /* Custom style */
            .header-right {
                width: calc(100% - 3.5rem);
            }
            .sidebar:hover {
                width: 16rem;
            }
            @media only screen and (min-width: 768px) {
                .header-right {
                    width: calc(100% - 16rem);
                }        
            }
            .form-input {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background-color: #fff;
                border-color: #e2e8f0;
                border-width: 1px;
                border-radius: .25rem;
                /* padding: .5rem .75rem; */
                font-size: 1rem;
                line-height: 1.5;
            }
          </style>
          <div x-data="setup()" :class="{ 'dark': isDark }">
              <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">
                
                @include('layouts.components.header')
                @include('layouts.components.sidebar')
              
                <main class="h-full ml-14 mt-14 mb-10 md:ml-64">
                    @yield('content')
                </main>
              </div>
            </div>    
          
            
        <script src="{{ asset('js/jq.js') }}"></script>
        <script src="{{ asset('js/swal.js') }}"></script>
        <script src="{{ asset('js/my.js') }}"></script>
        @stack('script')
    </body>
</html>
