@extends('admin.layouts.app')
@section('title')
    posts
@endsection
@section('posts')
    active
@endsection
@section('content')
    <div class="card my-3">
        <div class="card-header d-flex justify-content-between "> 
            <h3><i class="fa fa-address-book-o fa-1x" aria-hidden="true"></i>  
            @if(isset($categoryname)) 
            {{$categoryname}} posts
            @elseif(isset($tagname)) 
            posts of tag <span class="badge badge-dark">{{$tagname}}</span>
            @elseif(isset($user)) 
            {{$user }} posts  
            @elseif(isset($unapproved)) 
            {{$unapproved}} posts are not approved 
            @else 
            
            posts 
            @endif    
                
            
        </h3>
           <span> 
            <a href="{{route("post.create")}}" class="btn btn-success"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i> create post </a> 
            <a href="{{route("post.unaproved")}}" class="btn btn-warning"><i class="fa fa-check" aria-hidden="true"></i> unapproved posts </a>
           </span>
        </div>
        <div class="card-body">
            @if ($posts->count()==0)
                no posts exists  
            @else 
            <ul class="list-group my-3">
                @foreach ($posts as $post)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>
                            <img class="post-image" src="{{asset("storage/$post->featured")}}" alt="not found">
                            <span>{{ $post->title}}</span>
                        </span>
                        <span>
                            <a href="{{route("post.show",$post->id)}}" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i> view</a>
                            @if ($post->approve == 0 )
                            <a href="{{route("post.approve",$post->id)}}" class="btn btn-warning"> <i class="fa fa-check" aria-hidden="true"></i> approve</a> 
                            @endif

                        </span>
                    </li>
                @endforeach
            </ul>
            {{$posts->links()}} 
            @endif
        </div>
    </div>
@endsection
@section('css')
    <style>
        .post-image {
            width: 50px; 
            height: 50px;
            
        }
    </style>
@endsection