<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>@yield('title')</title>
    
        
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('css')
        <style>
            .btn-info , .btn-danger {
                color:#FFF ; 
            }
            
            
        </style>
    </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark   ">
        <div class="container ">
            <a class="navbar-brand" href="{{route("dashbord.index")}} @yield("dashbord")">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse  collapse-right" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto ">
                <li class="nav-item @yield('posts')">
                    <a class="nav-link" href="{{route("post.index")}}">posts </a>
                </li>
                <li class="nav-item @yield('categories')">   
                    <a class="nav-link" href="{{route("category.index")}}">categories</a>
                </li>
                <li class="nav-item @yield('tags')">
                    <a class="nav-link" href="{{route("tag.index")}}">tags</a>
                </li>
                <li class="nav-item @yield('users')">
                    <a class="nav-link " href="{{route("user.index")}}">users</a>
                </li>
                <li class="nav-item dropdown " >
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{auth()->user()->name}}
                    </a>
                    <div class="dropdown-menu  "  aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/" sty>goto app</a>
                    <a class="dropdown-item" href="{{route("user.edit",auth()->user()->id)}}">edit profile</a>
                    <a class="dropdown-item " href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                </ul>
                
            </div> 
        </div>
    </nav>
    <!-- Scripts -->
    <div class="container my-3">
        @if (session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{session()->get("success")}} . 
            </div>
        @endif
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('js')
</body>
</html>