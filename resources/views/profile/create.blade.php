@extends('layouts.app') 
@section('title')
    @isset($post)
    edit post
    @else 
    create post
    @endisset
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
            <a href="{{route("profile.createpost",auth()->user()->id)}}" class="text-decoration-none active">@isset($post)
                <i class="fa fa-edit" aria-hidden="true"></i> edit post
                @else 
                <i class="fa fa-user-plus" aria-hidden="true"></i> create post
                @endisset </a> 
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
            <div class="card my-3">
                <div class="card-header d-flex justify-content-between  "> 
                    
                    @isset($post)
                    <span class="font-weight-bold h4">edit post</span>
                    @else
                    <span class="font-weight-bold h4">create post</span>
                    @endisset
                </div>
                <div class="card-body">
                    <form action="
                    @isset($post) 
                    {{route("profile.updatepost",["user"=>auth()->user()->id,"post"=>$post->id])}}
                    @else
                    {{route("profile.store",auth()->user()->id)}}
                    @endisset" method="POST" enctype="multipart/form-data" class="form-create-post">
                        @csrf 
                        @isset($post)
                        @method("PUT")
                        @endisset
                        <div class="form-group">
                            <label for="title" class="font-weight-bold "> title *</label>
                            <input type="text" name="title" id="title" class="form-control" required 
                            @isset($post)
                                value="{{$post->title}}"
                            @endisset
                            >
                        </div>
                        <div class="form-group">
                            <label for="content" class="font-weight-bold ">discription *</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control content-text" required minlength="150">@isset($post){{$post->content}}@endisset</textarea>
                            <small class="small-content">at least charcters 150 </small>
                        </div>
                        <div class="form-group">
                            <label for="countermade" class="font-weight-bold"> country made * </label>
                            <input type="text" name="country" id="countrymade" class="form-control" @isset($post) value="{{$post->country}}" @endisset required>
                        </div> 
                        <div class="form-group">
                            <label for="status" class="font-weight-bold "> status *</label>
                            <select class="form-control" name="status"  required> 
                                <option value="">...</option>
                                <option value="new" @isset($post)@if($post->status=="new") selected @endif @endisset >new</option>
                                <option value="like new" @isset($post)@if($post->status=="like new") selected @endif @endisset>like new</option>
                                <option value="used" @isset($post)@if($post->status=="used") selected @endif @endisset>used</option> 
                                <option value="old" @isset($post)@if($post->status=="old") selected @endif @endisset>old</option>
                                <option value="very old" @isset($post)@if($post->status=="very old") selected @endif @endisset>very old</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category" class="font-weight-bold "> category *</label>
                            <select class="form-control" name="category"  required> 
                                <option value="">...</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" @isset($post)@if($post->category->id==$category->id) selected @endif @endisset>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <label for="price" class="font-weight-bold "> price*</label>
                            <input type="number" name="price" id="price" class="form-control col-5" @isset($post)value="{{$post->price}}" @endisset>
                            <label for="coil" class="font-weight-bold "> coil*</label>
                            <select class="form-control  col-5" name="coil"  required> 
                                <option value="dollar" @isset($post)@if($post->coil=="dollar") selected @endif @endisset >dollar</option>
                                <option value="pound" @isset($post)@if($post->coil=="pound") selected @endif @endisset >pound</option>
                                <option value="euro" @isset($post)@if($post->coil=="euro") selected @endif @endisset>euro</option>
                                <option value="Swiss franc" @isset($post)@if($post->coil=="Swiss franc") selected @endif @endisset>Swiss franc</option>
                                <option value="rouble" @isset($post)@if($post->coil=="rouble") selected @endif @endisset>rouble</option>
                                <option value="Australian dollar" @isset($post)@if($post->coil=="Australian dollar") selected @endif @endisset>Australian dollar</option>
                                <option value="Canadian dollar" @isset($post)@if($post->coil=="Canadian dollar") selected @endif @endisset>Canadian dollar</option>
                                <option value="rupee" @isset($post)@if($post->coil=="rupee") selected @endif @endisset>rupee</option>
                                <option value="yuan" @isset($post)@if($post->coil=="yuan") selected @endif @endisset>yuan</option>
                                <option value="Egyptain Pound" @isset($post)@if($post->coil=="Egyptain Pound") selected @endif @endisset>Egyptain pound</option>
                                <option value="Riyal" @isset($post)@if($post->coil=="Riyal") selected @endif @endisset>Riyal</option>
                                <option value="Dirham" @isset($post)@if($post->coil=="Dirham") selected @endif @endisset>Dirham</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="featured font-weight-bold ">image *</label> 
                            <input type="file" name="featured" id="image" class="form-control"
                            @isset($post)
                            @else 
                            required 
                            @endisset>
                        </div>
                        <div class="form-group">
                            <label for="tag"> tags *</label>
                            <select class="tag form-control" name="tags[]" multiple="multiple" required >
                                @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}"
                                        @isset($post)
                                            @foreach ($post->tags as $tagsss)
                                                @if ($tagsss->id == $tag->id)
                                                    selected
                                                @endif
                                            @endforeach 
                                        @endisset
                                        >{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button  type="submit" class="btn btn-success submit-form">save</button>
                    </form>
    
                </div>
            </div>
            </div>
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