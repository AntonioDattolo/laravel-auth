<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        @include('partials.navbar')
        <div class="container-fluid vh-100">
            <div class="row h-100">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse" style="padding-top:4.5rem ">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a class="nav-link text-white" href="/">
                                    <i class="fa-solid fa-home-alt fa-lg fa-fw"></i> Home
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.Project.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.Project.index') }}">
                                    <i class="fa-solid fa-diagram-project"></i> Projects
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.Project.create' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.Project.create') }}">
                                    <i class="fa-solid fa-plus"></i><i class="fa-solid fa-diagram-project"></i> Add a Project
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.Type.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.Type.index') }}">
                                    <i class="fa-solid fa-strikethrough"></i> Type
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.Type.create' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.Type.create') }}">
                                    <i class="fa-solid fa-strikethrough"></i><i class="fa-solid fa-plus"></i> Add Type
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.Technology.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.Technology.index') }}">
                                    <i class="fa-solid fa-microchip"></i> Technology
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.Technology.create' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.Technology.create') }}">
                                    <i class="fa-solid fa-microchip"></i><i class="fa-solid fa-plus"></i> Add Technology
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-sign-out-alt fa-lg fa-fw"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>

                    </div>
                </nav>
                
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 h-100 overflow-auto" style="padding-top:5rem">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
