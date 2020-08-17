<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <style>
.btn-info , .btn-danger {
    color:#FFF ; 
}

body {
background: #ecf1f5;
padding: 0px ;
margin:0px ; 
}

 footer  {
   margin-top: 90px ; 
   background-attachment: fixed;
   margin-bottom: 0px  ;
   position: relative;
   bottom: -248px;  
   }
footer .h1 {
	color:#ecf1f5  ;
}
 footer h3 {
 	color :#ecf1f5 ;
 }
footer .h1 span {
	color :#ec1c24   ;
}
footer p {
	color:#ecf1f5 ;
}
footer .fa-angle-down , footer .fa-angle-right{

	color: #ecf1f5 ;
	line-height: 1.4 ; 
	
	
}
.links-footer div {
	margin-bottom: 22px ;
}
.helpful-link{
	margin-bottom: 40px ;
}
footer .address , footer .phone , footer .Email {
	color:#ecf1f5; 
	margin-bottom: 62px ;

}
 footer .Email  span {
 	cursor: pointer; 
 	color:  #ecf1f5;
 }
  footer .Email  span:hover ,.links-footer div a:hover {
  	color:  #ec1c24 ;
  }
  .copy-rights {
  	margin-top: 40px; 
  	border-top: 1px solid #FFF ; 
  	width: 100% ; 
  	padding-top: 20px ;  
  	
  }
  .copy {
  	display: flex;  
  	justify-content: space-between;
  }
  .icons i {
  	margin-right: 20px ; 
  	color:#FFF ;
  	cursor: pointer; 
  } 
  footer  {
background: #343A40  ;
color:#FFF ; 
overflow: hidden; 
margin-bottom: 0px ; 
margin-top: 90px ; 
}
   
    </style>
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar  navbar-expand-lg     navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    MousaEshop
                </a>
                @auth
                <a  href="{{route("profile.notifications",auth()->user()->id)}}" class="mr-3 badge @if (auth()->user()->unreadNotifications()->count()>0)
                    badge-danger
                @else
                    badge-success
                @endif">{{auth()->user()->unreadNotifications()->count()}}</a>
                @endauth
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <form class="form-inline my-2 nav-link" action="{{route("category.seachpost")}}">
                        
                            <input class="form-control " name="post" type="search" placeholder="Search" aria-label="Search" required>
                            <button class="btn btn-outline-success  my-2 my-sm-0 " type="submit">Search</button>
                        </form>
                        
                    </ul>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @foreach ($categories as $category)
                        <li class="nav-item " style="margin-top: 11px ">
                            <a class="nav-link" href="{{route("category.posts",$category->id)}}">{{$category->name}}</a>
                        </li>
                        @endforeach
                        {{-- end Admin links --}} 
                        
                            
                            
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item" style="margin-top: 11px ">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item " style="margin-top: 11px ">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{Gravatar::src(auth()->user()->email)}}" alt="" style="width: 40px ; height: 40px ; border-radius: 50% ;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    {{-- start admin links --}}
                                        @auth
                                        @if (auth()->user()->isAdmin())
                                        <a href="{{route("dashbord.index")}}" class="dropdown-item"> admin Area </a>
                                        @endif
                                        <a href="{{route("profile.index",auth()->user()->id)}}" class="dropdown-item">my profile </a>
                                        @endauth
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main >
                @if (session()->has("success"))
                <div class="container my-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session()->get("success")}} . 
                    </div>
                </div>

                @endif
                @if (session()->has("failed"))
                <div class="container my-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session()->get("failed")}} . 
                    </div>
                </div>

                @endif
            
            
                @if ($errors->any())
                <div class="container my-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            
            @yield('content')
        </main>
    </div>
    @auth 
    @if (!in_array(request()->path(),[
        "login" , 
        "password/confirm", 
        "password/email" ,
        "password/reset" , 
        "register", 
        "profile/".auth()->user()->id , 
        "profile/".auth()->user()->id."/edit",
        "profile/".auth()->user()->id."/posts" , 
        "profile/".auth()->user()->id."/waitposts" , 
        "profile/".auth()->user()->id."/createpost" ,
        "profile/".auth()->user()->id."/notifications"
        

    ]))
    <footer  style="text-align: center ">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="h1">mousa<span>EShop</span></h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    

                </div>
                <div class="col-md-4 text-center    ">
                    <h3 class=" helpful-link">  helpful link </h3>
                    <div class="row links-footer">
                        <div class="col-6">

                            <i class="fa fa-angle-right">
                                <a href="#" title="">link#1</a>
                            </i>

                        </div>
                        <div class="col-6">

                            <i class="fa fa-angle-right"> <a href="#" title="">link#2</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#3</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#4</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#5</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#6</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#7</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#8</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#10</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#10</a></i>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 text-center ">
                    <h3 class="helpful-link"> contact us </h3>
                    <div class="">
                        <div class="address">
                            Africa , Egypt , Cairo , Hadak Al Koba
                        </div>
                        <div class="phone">
                            +201067849428
                        </div>
                        <div class="Email">
                            Email : <span>200moussa200@gmail.com </span>
                        </div>


                    </div>
                </div>
                <div class="copy-rights">
                    <div class="copy">
                        <div>
                            <p>copyRight &copy; mousa nageh 2020  </p>

                        </div>
                        <div class="icons">
                            <a href="https://www.facebook.com/profile.php?id=100005101952219" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="https://twitter.com/mousa_nageh" target="_blank"> <i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="https://github.com/MousaNageh" target="_blank"> <i class="fa fa-github" aria-hidden="true"></i></a>
                            <a href="https://www.youtube.com/channel/UCx4ErNdRFR5yIb3SW-yDY-Q?view_as=subscriber" target="_blank"> <i class="fa fa-youtube" aria-hidden="true"></i></a>
                    
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <!--end footer --> 
    @endif 
    @else
    @if (!in_array(request()->path(),[
        "login" , 
        "password/confirm", 
        "password/email" ,
        "password/reset" , 
        "register" 
    ]))
    <footer  style="text-align: center ">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="h1">mousa<span>EShop</span></h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    

                </div>
                <div class="col-md-4 text-center    ">
                    <h3 class=" helpful-link">  helpful link </h3>
                    <div class="row links-footer">
                        <div class="col-6">

                            <i class="fa fa-angle-right">
                                <a href="#" title="">link#1</a>
                            </i>

                        </div>
                        <div class="col-6">

                            <i class="fa fa-angle-right"> <a href="#" title="">link#2</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#3</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#4</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#5</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#6</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#7</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#8</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#10</a></i>
                        </div>
                        <div class="col-6">
                            <i class="fa fa-angle-right"> <a href="#" title="">link#10</a></i>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 text-center ">
                    <h3 class="helpful-link"> contact us </h3>
                    <div class="">
                        <div class="address">
                            Africa , Egypt , Cairo , Hadak Al Koba
                        </div>
                        <div class="phone">
                            +201067849428
                        </div>
                        <div class="Email">
                            Email : <span>200moussa200@gmail.com </span>
                        </div>


                    </div>
                </div>
                <div class="copy-rights">
                    <div class="copy">
                        <div>
                            <p>copyRight &copy; mousa nageh 2020  </p>

                        </div>
                        <div class="icons">
                            <a href="https://www.facebook.com/profile.php?id=100005101952219" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="https://twitter.com/mousa_nageh" target="_blank"> <i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="https://github.com/MousaNageh" target="_blank"> <i class="fa fa-github" aria-hidden="true"></i></a>
                            <a href="https://www.youtube.com/channel/UCx4ErNdRFR5yIb3SW-yDY-Q?view_as=subscriber" target="_blank"> <i class="fa fa-youtube" aria-hidden="true"></i></a>
                    
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <!--end footer -->
    @endif
    @endauth

    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('js') 
   
</body>
</html>
