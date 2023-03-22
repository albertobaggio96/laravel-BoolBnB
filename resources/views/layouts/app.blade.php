<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
         
        
        <div class="container-fluid d-flex g-0">
            {{-- REMOVE THE NAVBAR IF USER ISN'T LOGGED IN --}}
           @if(Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register' && Route::currentRouteName() != 'password.request')
            <header id="header" class="">
                @include('layouts.partials.navBar')
            </header>
           @endif


           <main class="{{Route::currentRouteName() == 'login' ? 'w-100' : ''}} w-100" id="main">
                {{-- REMOVE THE TOP NAVBAR IF USER ISN'T LOGGED IN --}}
                @if(Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register' && Route::currentRouteName() != 'password.request')
                    @include('topNavbar')
                @endif
                <div class="main-wrapper">
                    {{-- CONTENT FOR HOME BLADE --}}
                    @yield('content-home')
                    {{-- MAIN CONTENT --}}
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    {{-- to add file js --}}
    @vite(['resources/js/styleAnimation.js'])
    @yield('js')
</body>

</html>
