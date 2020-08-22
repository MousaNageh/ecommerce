@extends('layouts.app') 
@section('title')
    {{auth()->user()->name }} posts
@endsection
@section('content')
    <div class="nav-side" style="font-size: 19px ; text-align: left ; padding-left:15px ; ">
    <ul class="list-groug navlinks">
        <li class="my-5">
            <a href="{{route("profile.index",auth()->user()->id)}}" class="text-decoration-none "><i class="fa fa-user" aria-hidden="true"></i> my profile</a> 
        </li>
        <li class="my-5">
            <a href="{{route("profile.edit",auth()->user()->id)}}" class="text-decoration-none  "><i class="fa fa-edit" aria-hidden="true"></i> edit profile</a> 
        </li>
        <li class="my-5">
            <a href="{{route("profile.posts",auth()->user()->id)}}" class="text-decoration-none @if(!isset($wait)) active @endif"><i class="fa fa-calculator" aria-hidden="true"></i> my posts </a> 
        </li>
        <li class="my-5">
            <a href="{{route("profile.waitposts",auth()->user()->id)}}" class="text-decoration-none @if(isset($wait)) active @endif"><i class="fa fa-stop-circle" aria-hidden="true"></i> waiting posts </a> 
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
        <h2 class="my-5" style="color: #08526D">{{auth()->user()->name}}  posts </h2>
        @if ($posts->count()>0)
        <div class="container-fluid">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12  ">
                    <div class="tile post-card">
                        <div class="wrapper">
                            <div class="header">{{$post->title}}</div>
    
                            <a href="{{route("posts.show",$post->id)}}">
                                <div class="banner-img">
                                    <img src="{{asset("storage/$post->featured")}}" alt="Image 1">
                                </div>
                            </a>
    
                            <div class="dates">
                                <div class="start">
                                    <strong>STATUS</strong> {{$post->status}}
                                    <span></span>
                                </div>
                                <div class="ends">
                                    <strong>PRICE</strong> {{$post->price}} {{$post->coil}}
                                </div>
                            </div>
    
                            <div class="stats">
    
                                <div>
                                    <strong>COUNTRY MADE</strong> {{$post->country }}
                                </div>
    
                                <div>
                                    <strong>ADDED AT</strong> {{$post->created_at}}
                                </div>
                                <div>
                                    <strong>RATE (10)</strong> 6
                                </div>
                            </div>
                            </div>
                            <div class="footer">
                                <a href="{{route("posts.show",$post->id)}}" class="Cbtn Cbtn-primary">View and edit</a>
                                @auth
                                @if (auth()->user()->id == $post->user_id)
                                <a href="#" class="Cbtn Cbtn-danger" data-toggle="modal" data-target="#delete{{$post->id}}">Delete</a>
                                
                                @endif
                                @endauth
                            </div>
                        </div>
                    </div> 
                    <!-- delete Modal -->
                    <div class="modal fade" id="delete{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$post->id}}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="delete{{$post->id}}Label">Delete {{$post->title}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                are you sure you want to delete this post 
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form 
                                action="{{route("profile.deletepost",["user"=>auth()->user()->id , "post"=>$post->id])}}"
                                method="POST"> 
                                @csrf
                                @method("DELETE") 
                                <input type="submit" value="delete" class="btn btn-danger">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>        
        </div>
        <div class="container my-5" >
            {{$posts->links()}}
        </div>
        @else
        <div class="container">
            <h3>no posts !!</h3>

        </div>
        @endif
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
    /*start card */
* { margin: 0px; padding: 0px; }
body {
	background: #ecf1f5;
	font:14px "Open Sans", sans-serif; 
	text-align:center;
}

.tile{
	width: 100%;
	background:#fff;
	border-radius:5px;
	box-shadow:0px 2px 3px -1px rgba(151, 171, 187, 0.7);
	float:left;
  	transform-style: preserve-3d;
  	margin: 10px 5px;

}

.header{
	border-bottom:1px solid #ebeff2;
	padding:19px 0;
	text-align:center;
	color:#59687f;
	font-size:600;
	font-size:19px;	
	position:relative;
}

.banner-img {
	padding: 5px 5px 0;
}

.banner-img img {
	width: 100%;
    border-radius: 5px;
    height: 350px ;  
}

.dates{
	border:1px solid #ebeff2;
	border-radius:5px;
	padding:20px 0px;
	margin:10px 20px;
	font-size:16px;
	color:#5aadef;
	font-weight:600;	
	overflow:auto;
}
.dates div{
	float:left;
	width:50%;
	text-align:center;
	position:relative;
}
.dates strong,
.stats strong{
	display:block;
	color:#adb8c2;
	font-size:11px;
	font-weight:700;
}
.dates span{
	width:1px;
	height:40px;
	position:absolute;
	right:0;
	top:0;	
	background:#ebeff2;
}
.stats{
	border-top:1px solid #ebeff2;
	background:#f7f8fa;
	overflow:auto;
	padding:15px 0;
	font-size:16px;
	color:#59687f;
	font-weight:600;
	border-radius: 0 0 5px 5px;
}
.stats div{
	border-right:1px solid #ebeff2;
	width: 33.33333%;
	float:left;
	text-align:center
}

.stats div:nth-of-type(3){border:none;}

div.footer {
	text-align: right;
	position: relative;
	margin: 20px 5px;
}

div.footer a.Cbtn{
	padding: 10px 25px;
	background-color: #DADADA;
	color: #666;
	margin: 10px 2px;
	text-transform: uppercase;
	font-weight: bold;
	text-decoration: none;
	border-radius: 3px;
}

div.footer a.Cbtn-primary{
	background-color: #5AADF2;
	color: #FFF;
}

div.footer a.Cbtn-primary:hover{
	background-color: #7dbef5;
}

div.footer a.Cbtn-danger{
	background-color: #fc5a5a;
	color: #FFF;
}
div.footer a.Cbtn-edit {
    background-color: #11eeac;
    color: #FFF;
} 

div.footer a.Cbtn-danger:hover{
	background-color: #fd7676;
}
.post-card {
    transition: all .4s ease-in-out ; 
}
.post-card:hover{
    transform: scale(1.05) ; 
} 
/*end card */
    

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