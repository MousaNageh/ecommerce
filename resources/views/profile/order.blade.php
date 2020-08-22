@extends('layouts.app') 
@section('title')
    orders
@endsection
@section('content')
    <div class="nav-side" style="font-size: 19px ; text-align: left ; padding-left:15px ; ">
    <ul class="list-groug navlinks">
        <li class="my-4">
            <a href="{{route("profile.index",auth()->user()->id)}}" class="text-decoration-none "><i class="fa fa-user" aria-hidden="true"></i> my profile</a> 
        </li>
        <li class="my-5">
            <a href="{{route("profile.edit",auth()->user()->id)}}" class="text-decoration-none"><i class="fa fa-edit" aria-hidden="true"></i> edit profile</a> 
        </li>
        <li class="my-5">
            <a href="{{route("profile.posts",auth()->user()->id)}}" class="text-decoration-none"><i class="fa fa-calculator" aria-hidden="true"></i> my posts </a> 
        </li>
        <li class="my-5">
            <a href="{{route("profile.waitposts",auth()->user()->id)}}" class="text-decoration-none"><i class="fa fa-stop-circle" aria-hidden="true"></i> waiting posts </a> 
        </li>
        <li class="my-5">
            <a href="{{route("profile.createpost",auth()->user()->id)}}" class="text-decoration-none ">@isset($post)
                <i class="fa fa-edit" aria-hidden="true"></i> edit post
                @else 
                <i class="fa fa-user-plus" aria-hidden="true"></i> create post
                @endisset </a> 
        </li>
        <li class="my-5">
            <a href="{{route("profile.showorders",auth()->user()->id)}}" class="text-decoration-none active"><i class="fa fa-first-order" aria-hidden="true"></i> orders </a> 
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
        <div class="container my-5">
            
                <div class="d-flex justify-content-between order-header"> 
                    <h3>orders</h3>
                    @if ($orders>0)
                        <span>
                            <span class="badge badge-danger">Undeviered orders <strong>{{$unrecievedOrders}}</strong></span>  
                            <span class="badge badge-success">deviered orders <strong>{{$recievedOders}}</strong></span>  
                        </span>
                    @else
                        
                    @endif
                    
                </div>
                
                    @if ($orders>0)
                        
                        @foreach ($posts as $post)
                            @if ($post->orders()->count()>0)
                            <div class="order-title">{{$post->title}}</div>
                            <div class="row my-5">
                                
                                <div class="col-md-4">
                                    <div class="order-img">
                                        
                                        <img src="{{asset("storage/".$post->featured)}}" alt="" width="100%">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="order-body">
                                        <ul class="list-group">
                                            @foreach ($post->orders as $order)
                                            <li class="list-group-item"> 
                                                <div>customer Name : <strong>{{$order->customer->name}}</strong></div>
                                                <div>customer Email : <strong>{{$order->customer->email}}</strong></div>
                                                <div>Request date : <strong>{{$order->customer->created_at}}</strong></div> 
                                                @if ($order->recieved ==0)
                                                <div>Request status : <span class="badge badge-danger">not recieved</span></div>
                                                @else
                                                <div>Request status : <span class="badge badge-success">recieved</span></div>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                </div>
                            </div> 
                            </div>
                            @endif
                            
                            @endforeach 
                        
                    @else
                        <div class="my-3">no orders !! </div>
                    @endif
                
        </div>
    </section>
    <div class="view-dashbord">
        <i class="fa fa-certificate fa-2x" aria-hidden="true"></i>
    </div>
    
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
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
    .order-header{
        background: #b4cfe2 ; 
        padding: 10px ; 
        border-radius: 10px ; 
        box-shadow: 2px 2px 2px #000 ;  
    }
    .order-header .badge{
        font-size: 13px ;
    }
    .order-title {
        font-size: 20px ; 
        text-align: center  ; 
        margin: 10px ;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('js')
<script src="//unpkg.com/jquery@3.4.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" defer></script>
<script>
    $(document).ready(function(){
        $('.tag').select2();
        $(".view-dashbord").click(function(){
            $("body").toggleClass("body-margine") ;
            $(".nav-side").toggleClass("bashboard-margin") ;
            $(".view-dashbord").toggleClass("edit-view") ;
        }) ; 
        $(".content-text").keyup(function(){ 
            $(".small-content").html("min 150 /"+$(this).val().length) ; 
            if($(this).val().length<150){
                $(".small-content").css("color","red") ; 
            } 
            else 
            {
                $(".small-content").css("color","green") ; 
            }
        });
    }); 
</script>
@endsection