<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}} | @hasSection('title') @yield('title') @else job hunting @endif</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/logo.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/icon.png')}}">
    <link rel="stylesheet" href="{{asset('css/cabinet-grotesk.css')}}">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js'])  --}}
    <link rel="stylesheet" href="{{asset('build/assets/app.adf1c325.css')}}" type="text/css">
</head>
<body class="mb-20 font-cabinet text-text">
    <x-flash-message />
    <nav class="
        w-full
        flex flex-wrap
        items-center
        justify-between
        navbar navbar-expand-lg navbar-light bg-primary text-text-lighter px-2 py-1 sticky top-0">
        <div class="logo text-text-light flex self-start items-center gap-1">
            <div class="w-auto">
                <a href="/" >
                    <img class="h-10 md:h-16" src="{{asset('images/logo.png')}}" alt="" class="logo"/>
                </a>
            </div>
            <h1 class="text-xl md:text-3xl font-bold pr-2 mr-2 border-r border-text-light">FindEasyJob</h1>
            <h6 class="text-md md:text-xl">job hunting</h6>
        </div>
        <div class="">
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <img class=" w-7" src="{{asset('images/menu.svg')}}" alt="menu">
            </button>
        </div>
        <div class="collapse navbar-collapse flex-grow md:justify-end items-center" id="navMenu">
            <ul class="flex py-2 gap-2 mr-6 text-lg items-center font-bold navbar-nav flex-col pl-0 list-style-none">
                @auth
                    <li class="flex flex-col md:flex-row md:gap-2 items-center">
                        <div class="w-auto bg-white border border-primary-darker p-1 px-3 rounded-md">
                            <img src="{{asset('images/avatar-icon.svg')}}" alt="avatar">
                        </div>
                        <span class="text-white">Welcome {{auth()->user()->name}}</span>
                    </li>
                    <li>
                        <a href="/posts/manage" class="flex gap-2 hover:text-white transition-all">
                            <img class="w-6" src="{{asset('images/manage-post-icon.svg')}}" alt="manage posts"> Manage Job Posts
                        </a>
                    </li>
                    <li>
                        <form action="/users/logout" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="flex gap-2 hover:text-white transition-all" class="">
                                <img class="w-7" src="{{asset('images/logout-icon.svg')}}" alt="logout"> Log Out
                            </button>
                        </form>
                    </li>
                @else
                    <li class="">
                        <a href="/register" class="flex gap-2 hover:text-white transition-all">
                            <img class="w-7" src="{{asset('images/register-icon.svg')}}" alt="register"> Sign up
                        </a>
                    </li>
                    <li class="">
                        <a href="/login" class="flex gap-2 hover:text-white transition-all">
                            <img class="w-7" src="{{asset('images/login-icon.svg')}}" alt="login">Sign in
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <main class="w-full px-4">
        {{$slot}}
    </main>
    <footer class="fixed bottom-0 left-0 w-full flex items-center bg-primary text-text-light h-10 mt-24 justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
    </footer>
    <script src="{{asset('build/assets/app.99e705d3.js')}}"></script>
</body>
</html>
