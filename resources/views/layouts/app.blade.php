<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') Project List</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navigation.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    CodeFlex
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar Column - MUST come first in HTML flow -->
                <div class="col-md-3 order-md-first sidebar-col">
                    <div class="sidebar-content bg-light p-3 h-100">
                        <!-- Create Project Button -->
                        <div class="d-grid mb-3">
                            <a href="{{ Auth::check() ? route('projects.create') : 'javascript:void(0);' }}" 
                            class="btn btn-primary {{ Auth::check() ? '' : 'disabled' }}"
                            style="{{ Auth::check() ? '' : 'pointer-events: none; cursor: default;' }}">
                                + Create Project
                            </a>
                        </div>
        
                        <h5 class="mb-3"><strong>Projects Navigation</strong></h5>
                        <ul class="list-group">
                            <li class="list-group-item border-0 bg-transparent">
                                <a href="{{ Auth::check() ? route('projects.index') : 'javascript:void(0);' }}"
                                    class="text-decoration-none {{ Auth::check() ? '' : 'text-muted' }}"
                                    style="{{ Auth::check() ? '' : 'pointer-events: none; cursor: default;' }}">
                                    Available Projects
                                 </a>
                            </li>
                            <li class="list-group-item border-0 bg-transparent">
                                <a href="{{ Auth::check() ? route('projects.ownedProjects') : 'javascript:void(0);' }}"
                                    class="text-decoration-none {{ Auth::check() ? '' : 'text-muted' }}"
                                    style="{{ Auth::check() ? '' : 'pointer-events: none; cursor: default;' }}">
                                    My Projects
                                 </a>
                                                            
                            </li>
                            <li class="list-group-item border-0 bg-transparent">
                                <a href="{{ Auth::check() ? route('projects.biddedProjects') : 'javascript:void(0);' }}"
                                    class="text-decoration-none {{ Auth::check() ? '' : 'text-muted' }}"
                                    style="{{ Auth::check() ? '' : 'pointer-events: none; cursor: default;' }}">
                                    Projects Assigned To Me 
                                 </a>                            
                            </li>
                            <li class="list-group-item border-0 bg-transparent">
                                <a href="{{ Auth::check() ? route('projects.bidProjects') : 'javascript:void(0);' }}"
                                    class="text-decoration-none {{ Auth::check() ? '' : 'text-muted' }}"
                                    style="{{ Auth::check() ? '' : 'pointer-events: none; cursor: default;' }}">
                                    Bidded Projects
                                 </a>
                            </li>
                        </ul>
                    </div>
                </div>
                    <!-- Main Content Column -->
                <div class="col-md-9 order-md-last main-content-col">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>  
    @yield('script')      
</body>
</html>

