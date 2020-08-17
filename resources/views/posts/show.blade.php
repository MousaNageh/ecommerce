@extends('layouts.app') 
@section('title')
{{ $post->title}} 
@endsection 


@section('content')

<section class="last-post text-center"> 

<div class="container">
    <div class="row">
        <div class="  post-card">
            <div class="tile">
                <div class="wrapper">
                    <div class="header">{{$post->title}}</div>

                    
                        <div class="banner-img">
                            <img src="{{asset("storage/$post->featured")}}" alt="Image 1">
                        </div>
                    

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
                            <strong>RATE (10)</strong> 4
                        </div>
                    </div> 
                    <div class="stats" style="padding: 20px ">
                        <h2 class="my-2" style="color: #08526D">discription</h2>
                        {{$post->content}}
					</div>
					<div class="stata my-5">
						<h2 class="my-2" style="color: #08526D">tags</h2>
						@foreach ($tags as $tag)
							<a href="{{route("posts.tag",$tag->id)}}"><span class="badge badge-dark my-2" style="font-size: 18px ">{{$tag->name}}</span></a>
						@endforeach
					</div>
                    <div>
                        <h2 class="my-2" style="color: #08526D">comments</h2>
                        <div id="disqus_thread"></div>
                        <script>
                        (function() { 
                        var d = document, s = d.createElement('script');
                        s.src = 'https://mousaeshop-1.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>
                </div>
                    <div class="footer"> 
                        @auth
                            @if (auth()->user()->id == $post->user_id)
                            <a href="{{route("profile.editpost",["user"=>auth()->user()->id , "post"=>$post->id])}}" class="Cbtn Cbtn-edit" >EDIT</a>
                            @else 
                            <a href="{{route("posts.pay",$post->id)}}" class="Cbtn Cbtn-primary" >pay it</a>
                            @endif
                        @else 
                        <a href="{{route("login")}}" class="Cbtn Cbtn-primary" >login to pay</a>
                        @endauth
                        
                        
                        
                    </div>
                </div>
            </div> 
    </div>        
</div>
</section>
@endsection 

@section('css')
<style>
    
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

/*end card */
</style>
@endsection
