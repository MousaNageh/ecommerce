@extends('admin.layouts.app')
@section('title')
    show post 
@endsection
@section('posts')
    active
@endsection
@section('content')
    <div class="card my-3">
        <div class="card-header d-flex justify-content-between">
            <h4>{{$post->title}}</h4>
            <span>
                <a href="{{URL::previous()}}" class="btn btn-primary">back</a>
                @if (auth()->user()->id == $post->user_id)
                <a href="{{route("post.edit",$post->id)}}" class="btn btn-success">edit</a>
                @if (auth()->user()->isAdmin())
                <a href="" class="btn btn-danger"  class="btn btn-primary" data-toggle="modal" data-target="#deletepost{{$post->id}}">delete</a>
                @endif
                @endif
                
                <!-- Modal -->
                <div class="modal fade" id="deletepost{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="deletepost{{$post->id}}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="deletepost{{$post->id}}Label">delete {{$post->title}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            are you sure you want to delete this post 
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="{{route("post.destroy",$post->id)}}" method="POST" class="delete-post">
                                @csrf
                                @method("DELETE") 
                                <input type="hidden" name="userID" value="{{$post->user->id}}"> 
                                <input type="submit" value="delete" class="btn btn-danger">
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </span>
        </div>
        <div class="card-body">
            <div class="div-image my-4">
                <img class="post-image" src="{{asset("storage/$post->featured")}}" alt="not found">
            </div>
            <div class="content-text text-center my-3 ">
                <h4>discription</h4>
                <p class="content ">
                    {{$post->content}}
                </p>
            </div>
            <div class="status my-3">
                <h4><strong>status: </strong>{{$post->status}} </h4>
            </div>
            <div class="country my-3">
                <h4><strong>country made: </strong>{{$post->country}} </h4>
            </div>
            <div class="price my-3">
                <h4><strong>price: </strong>{{$post->price}} <strong>{{ $post->coil}}</strong> </h4>
            </div>
            <div class="tags my-3">
                <h4><strong>Tags:</strong></h4> 
                @foreach ($post->tags as $tag)
                    <span class="badge badge-dark">{{$tag->name}}</span>
                @endforeach            
            </div>
            <div class="user my-3">
                <h4><strong>creator info :</strong></h4>
                <div>
                    <strong>name :</strong><span>{{$post->user->name}}</span>
                </div>
                <div>
                    <strong>Email :</strong><span>{{$post->user->email}}</span>
                </div> 
                @if (auth()->user()->isAdmin())
                <div>
                    <strong>Admin :</strong>
                    <span>
                        @if ($post->user->isAdmin())
                            yes
                        @else
                            no 
                        @endif
                    </span>
                </div> 
                @endif
                
            </div>
        </div> 
        
    </div>
@endsection
@section('css')
    <style>
        .div-image{
            text-align: center ; 
        }
        .post-image{
            width: 80%; 
            box-shadow: 3px 3px 5px #000 ; 
            
        }
        .content-text , .price , .status , .country , .tags , .user{
            border: 1px solid #EEE ; 
            padding: 10px ; 
            border-radius: 10px ; 
            box-shadow: 2px 2px 2px #9c95b3 ; 
        }
        .delete-post {
            display: inline;
        }
    </style>
@endsection