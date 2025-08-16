<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <!-- Custom Pagination Styling -->
    <style>
        .pagination {
            justify-content: center;
            margin: 0;
            gap: 4px;
        }
        
        .pagination .page-link {
            padding: 0.375rem 0.5rem;
            margin: 0;
            border-radius: 4px;
            border: 1px solid #dee2e6;
            color: #6c757d;
            background-color: #fff;
            font-size: 0.875rem;
            min-width: 36px;
            height: 36px;
            text-align: center;
            transition: all 0.15s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }
        
        .pagination .page-link:hover {
            background-color: #e9ecef;
            border-color: #adb5bd;
            color: #495057;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .pagination .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: white;
            font-weight: 500;
        }
        
        .pagination .page-item.disabled .page-link {
            color: #adb5bd;
            background-color: #f8f9fa;
            border-color: #dee2e6;
            cursor: not-allowed;
            opacity: 0.6;
        }
        
        /* Arrow styling - make them smaller and more compact */
        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            font-size: 0.75rem;
            font-weight: bold;
            min-width: 32px;
            height: 32px;
        }
        
        /* Responsive pagination adjustments */
        @media (max-width: 576px) {
            .pagination {
                gap: 2px;
            }
            
            .pagination .page-link {
                padding: 0.25rem 0.375rem;
                font-size: 0.8rem;
                min-width: 32px;
                height: 32px;
            }
            
            .pagination .page-item:not(.active):not(.disabled) .page-link {
                display: none;
            }
            
            .pagination .page-item.active .page-link,
            .pagination .page-item:first-child .page-link,
            .pagination .page-item:last-child .page-link {
                display: flex;
            }
            
            /* Even smaller arrows on mobile */
            .pagination .page-item:first-child .page-link,
            .pagination .page-item:last-child .page-link {
                min-width: 28px;
                height: 28px;
                font-size: 0.7rem;
            }
        }
        
        @media (max-width: 768px) {
            .pagination .page-link {
                padding: 0.3125rem 0.4375rem;
                min-width: 34px;
                height: 34px;
            }
            
            .pagination .page-item:first-child .page-link,
            .pagination .page-item:last-child .page-link {
                min-width: 30px;
                height: 30px;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Blog CMS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    <i class="fas fa-tachometer-alt"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.posts.index') }}">
                                    <i class="fas fa-newspaper"></i> Posts
                                </a>
                            </li>
                        @endauth
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
