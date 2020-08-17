@extends('layouts.app')
@section('title')
    home
@endsection
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner outer-of-overlay">
        
            <div class="carousel-item active">
                    <img src="{{asset("images/welcome/1.jpg")}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption  d-md-block" >
                        <h5>cell phones</h5>
                        <p>you will get Awesome cell phones </p>
                    </div>
                </div>
                <div class="carousel-item">
                <img src="{{asset("images/welcome/2.jpg")}}" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block">
                    <h5>PC </h5>
                    <p>you will get Awesome PC</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{asset("images/welcome/3.jpg")}}" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block">
                    <h5>clothing</h5>
                    <p>you will get Awesome clothing </p>
                </div>
                </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<section class="features my-5 text-center">
     
    <div class="container my-5">
        <h2 class="h1" style="color: #08526D">who we Are </h2>
        <div class="row my-5">

            <div class="col-ms-6 col-lg-3">
                <div class="feat  wow bounceInUp" data-wow-offset="200">
                    <i class="fa fa-address-card-o fa-4x" aria-hidden="true"></i>
                    <h2 class="text-center "> feature1</h2>
                    <p class="text-center lead">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        .
                    </p>
                </div>
            </div>
            <div class="col-ms-6 col-lg-3">
                <div class="feat wow bounceInLeft wow bounceInLeft" data-wow-offset="200">
                    <i class="fa fa-align-center fa-4x" aria-hidden="true"></i>
                    <h2 class="text-center "> feature1</h2>
                    <p class="text-center lead">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        .
                    </p>
                </div>
            </div>
            <div class="col-ms-6 col-lg-3">
                <div class="feat wow bounceInDown" data-wow-offset="200">
                    <i class="fa fa-amazon fa-4x" aria-hidden="true"></i>
                    <h2 class="text-center "> feature1</h2>
                    <p class="text-center lead">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        .
                    </p>
                </div>
            </div>
            <div class="col-ms-6 col-lg-3">
                <div class="feat wow bounceInRight" data-wow-offset="200">
                    <i class="fa fa-arrow-circle-left fa-4x" aria-hidden="true"></i>
                    <h2 class="text-center "> feature1</h2>
                    <p class="text-center lead">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        .
                    </p>
                </div>
            </div>


        </div>
    </div>
</section> 
 <!--start company overview-->
 <section class="company-overview text-center">
    <div class="container">
        <h2 class="h1 wow bounceInUp ">company overview</h2>
        <p class="lead wow bounceInDown">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#company-overviews"> rearn more </button> 
        <div  class="modal fade" id="company-overviews" tabindex="-1" role="dialog" aria-labelledby="company-overviewsLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="company-overviewsLabel">company overview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body my-5 text-left " style="line-height:200%">
                    
The standard Lorem Ipsum passage, used since the 1500s
"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"

1914 translation by H. Rackham
"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"

Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."

1914 translation by H. Rackham
"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
                </div>
            </div>
            </div>
    </div>
</section>

<!--end compoanyy overview -->
<!-- start why shoose us -->
<section class="why-us ">
    <h2 class="h1 my-5 text-center" style="color: #08526D"> why US </h2>
    <div class="container-fluid wow bounceInLeft" data-wow-offset="100" data-wow-duration="1s">
        <div class="row"> 
            
            <div class="col-md home">

            </div>
            <div class="col-md info wow bounceInRight" data-wow-offset="100" data-wow-duration="1s">
                <h2 class="h1" style="color: #08526D"> why choose us ? </h2>
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <span>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                </span>
                <button type="button" class="btn btn-danger"data-toggle="modal" data-target="#aboutus" >view more </button>
                
            </div>
        </div>
    </div>
</section>
<div  class="modal fade" id="aboutus" tabindex="-1" role="dialog" aria-labelledby="aboutusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="aboutusLabel">company overview</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body my-5 text-left " style="line-height:200%">
            
The mousa standard Lorem Ipsum passage, used since the 1500s
"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"

1914 translation by H. Rackham
"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"

Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."

1914 translation by H. Rackham
"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
        </div>
    </div>
    </div>
 
 <!--start last post-->
 <section class="last-post text-center"> 
    <h2 class="my-5" style="color: #08526D">last  posts </h2>
    <div class="container-fluid">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12   ">
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
                            <a href="{{route("posts.show",$post->id)}}" class="Cbtn Cbtn-primary">View</a>
                        </div>
                    </div>
                </div> 
            @endforeach
        </div>        
    </div>
    
</section>

@endsection
@section('css')
<style>
    
    

    .carousel-item img {
        widows: 100%; 
        background-size: cover ; 
        resize: both ; 
    }
    .carousel-caption {
        background:rgba(0,0,0,.5) ; 
        padding: 20px ; 
        border-radius: 20px ;
    }

.features {
	margin-top: 50px ;
} 
.feat {
	padding: 10px ;
}
.features  i {
	display: block; 
	margin-bottom: 20px ;
	color:#ec1c24 ;
}
.features h2   {
color :#08526d ;
}
.features p {
	color : rgba(0,0,0,.6);
}
.company-overview {
 	margin-top:50px ;
 	padding: 40px ;
 	background: #DDD ;

 }   
 .company-overview  h2 {
 	margin-bottom: 30px ; 
 	text-transform: uppercase; 
    color : #08526d;
 }
 .company-overview  button {
 	padding: 10px ; 
 	text-transform: uppercase;
 	transition: all .4s ease-in-out ;
 	background: #ec1c24 ; 
 }
 .company-overview  button:hover {
 	 background:  #08526d ;
 	 border:none;
 }
 
.why-us {
  margin-top:60px ; 
  color 

}
.why-us .home {
	background: url("http://127.0.0.1:8000/images/welcome/4.jpg");
	background-size: cover ;  
}
.why-us .info {
	background:  #08526d  ; 
	color:#FFF ; 
	padding: 20px ; 
}
.why-us .info  h2 {
	margin-top:40px ;
	margin-bottom: 40px ;
	font-weight: bold; 
}
.why-us .info  p , .why-us .info  span  {
	font-size: 16px ; 
	line-height: 2 ;
	padding-right:  30px ;

}
.why-us .info button { 
	padding: 10px ; 
	display: block;
	margin-top:30px;
	margin-bottom: 40px ; 
	width: 200px ;
	background:  #ec1c24   ; 
}
@media (max-width:767px ){
.why-us .home {
	height: 500px ;
}

}
/* end why us */ 




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
        var WH = $(window).height() ; 
        var NH = $(".navbar").innerHeight() ; 
        $(".slider,.carousel-inner ,.carousel-item , .carousel-item img").height(WH-NH) ; 
    }) ; 
    $(window).resize(function(){
        WH = $(window).height() ; 
        NH = $(".navbar").innerHeight() ; 
        $(".slider,.carousel-inner ,.carousel-item").height(WH-NH) ;
    }); 
    
    
    
    

</script>
@endsection
