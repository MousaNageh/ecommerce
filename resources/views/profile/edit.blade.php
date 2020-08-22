@extends('layouts.app') 
@section('title')
    edit profile
@endsection
@section('content')
    <div class="nav-side" style="font-size: 19px ; text-align: left ; padding-left:15px ; ">
    <ul class="list-groug navlinks">
        <li class="my-5">
            <a href="{{route("profile.index",auth()->user()->id)}}" class="text-decoration-none "><i class="fa fa-user" aria-hidden="true"></i> my profile</a> 
        </li>
        <li class="my-5">
            <a href="{{route("profile.edit",auth()->user()->id)}}" class="text-decoration-none active "><i class="fa fa-edit" aria-hidden="true"></i> edit profile</a> 
        </li>
        <li class="my-5">
            <a href="{{route("profile.posts",auth()->user()->id)}}" class="text-decoration-none"><i class="fa fa-calculator" aria-hidden="true"></i> my posts </a> 
        </li>
        <li class="my-5">
            <a href="{{route("profile.waitposts",auth()->user()->id)}}" class="text-decoration-none"><i class="fa fa-stop-circle" aria-hidden="true"></i> waiting posts </a> 
        </li>
        <li class="my-5">
            <a href="{{route("profile.createpost",auth()->user()->id)}}" class="text-decoration-none"><i class="fa fa-user-plus" aria-hidden="true"></i> create post </a> 
        </li>
        <li class="my-5">
            <a href="{{route("profile.showorders",auth()->user()->id)}}" class="text-decoration-none"><i class="fa fa-first-order" aria-hidden="true"></i> orders </a> 
        </li>
        <li class="my-5" 
        style="position: relative ; "
        >
            <a href="{{route("profile.notifications",auth()->user()->id)}}" class="text-decoration-none"><i class="fa fa-bell" aria-hidden="true"></i> notifications </a> 
            <span 
            style="position: absolute ; left: 11px; top:1px ; font-size: 7px ;  "
            class="badge @if (auth()->user()->unreadNotifications()->count()>0)
                badge-danger
            @else
            badge-success
            @endif">{{auth()->user()->unreadNotifications()->count()}}</span> 
            
        </li>
        <li class="my-5">
            <a  class="text-decoration-none" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out" aria-hidden="true" style="color:#fe364a"></i>
                                        {{ __('Logout') }}
            </a> 
        </li>
    </ul>
    </div>
    <section class="content">
        <div class="container">
            <div class="card my-5">
                <div class="card-header"><h3><img src="{{Gravatar::src($user->email)}}" alt="" style="width: 50px ; height: 50px ; border-radius: 50%">{{$user->name}}</h3></div> 
                <div class="card-body">
                    <form action="{{route("profile.update",$user->id)}}" method="POST">
                        @csrf 
                        @method("PUT")
                        <div class="form-group">
                            <label for="name" class="font-weight-bold" > name</label>
                            <input type="text" name="name" id="name"  value="{{$user->name}} " class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-bold"> email</label>
                            <input type="email" name="email" id="email" value="{{$user->email}}"  class="form-control @error('email') is-invalid @enderror" >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="font-weight-bold"> password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" autocomplete="off">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="font-weight-bold">again password</label>
                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control" autocomplete="off">
                        </div>
                        <input type="submit" value="save" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="view-dashbord">
        <i class="fa fa-certificate fa-2x" aria-hidden="true"></i>
    </div>
    
@endsection
@section('css')

<style>
    * { margin: 0px; padding: 0px; } 
    body , html{
        
        padding: 0px ;
        margin-left: 100px  ;  
    }
    .nav-side {
        width: 200px  ; 
        height: 100% ; 
        background:  #343A40  ; 
        position: fixed;
        background-attachment: fixed ;  
        top: 0px ; 
        left:0px  ; 
        padding-top: 70px ; 
        overflow: auto ; 

        
    }
    .view-dashbord {
        padding:5px  ; 
        color:#FFF ;
        background: #343A40  ; 
        position: fixed ;
        border-radius: 0px 10px 10px 0px ;
        cursor: pointer; 
        display: none ;  
        transition: all .4s ease-in-out  ; 
    }

    @media(max-width:991px) {
        body , html{
        
        padding: 0px ;
        margin-left: 0px  ; 
        transition: all .4s ease-in-out  ;  

    }
        .nav-side {
        width: 200px  ; 
        height: 100% ; 
        background:  #343A40  ; 
        position: fixed;
        background-attachment: fixed ;  
        top: 0px ; 
        left:0px  ; 
        padding-top: 70px ; 
        margin-left: -200px ;      
        transition: all .4s ease-in-out  ; 
    }
    .view-dashbord{
        display:block ; 
    } 
    .body-margine {
        margin-left: 200px ; 
    }
    .bashboard-margin {
        margin-left:0px ; 
    }
    .view-dashbord {
        top:70px;
        
    }
    

    }
    .navlinks .active {
        color:springgreen ; 
    } 
    

</style>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(".view-dashbord").click(function(){
            $("body").toggleClass("body-margine") ;
            $(".nav-side").toggleClass("bashboard-margin") ;
            $(".view-dashbord").toggleClass("edit-view") ;
        }) ; 
    }); 
    
    
    
    

</script>
@endsection