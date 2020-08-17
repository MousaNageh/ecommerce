<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title> @isset($post)
            edit post
            @else
            create post
        @endisset</title>
    
        
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="//unpkg.com/bootstrap@3.3.7/dist/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="//unpkg.com/bootstrap-select@1.12.4/dist/css/bootstrap-select.min.css" type="text/css" />
        <link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css" /> 
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            .navbar-collapse li {
                margin-right: 10px ; 
            }
        </style>
    </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark   ">
        <div class="container ">
            <a class="navbar-brand" href="{{route("dashbord.index")}}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse  collapse-right" id="navbarSupportedContent">
                <ul class="navbar-nav float-right ">
                <li class="nav-item active">
                    <a class="nav-link">posts </a>
                </li>
                <li class="nav-item ">   
                    <a class="nav-link" href="{{route("category.index")}}">categories</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route("tag.index")}}">tags</a>
                </li>
                <li class="nav-item ">
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
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
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
                {{route("post.update",$post->id)}}
                @else
                {{route("post.store")}}
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
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control" required>@isset($post){{$post->content}}@endisset</textarea>
                        <small>at least charcters 150 </small>
                    </div>
                    <div class="form-group">
                        <label for="countermade" class="font-weight-bold"> country made * </label>
                        <select class="selectpicker countrypicker form-control" @isset($post) data-default="{{$post->country}}" @endisset   name="country"  required></select>
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
    
    <script src="//unpkg.com/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="//unpkg.com/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    <script src="//unpkg.com/bootstrap-select@1.12.4/dist/js/bootstrap-select.min.js"></script>
    <script src="//unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
    $('.tag').select2();
        });
    </script>
</body>
</html>