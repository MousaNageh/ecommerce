@extends('admin.layouts.app')
@section('title')
    dashbord
@endsection
@section('dashbord')
active
@endsection
@section('content')
    <div class="card my-3">
        <div class="card-header "> <h3><i class="fa fa-users" aria-hidden="true"></i> Users </h3></div>
        <div class="card-body">
            
            <a href="{{route("user.index")}}" class="text-decoration-none">
                <div class="users-number text-center"> 
                    <div> 
                        <i class="fa fa-users fa-5x" aria-hidden="true"></i>
                    </div>
                    {{$usersnumber}} 
                </div>
            </a> 
            <h2 class="text-center my-5 last-users-title">last users</h2>
            <ul class="list-group my-5">
                @foreach ($lastusers as $user) 
                <li class="list-group-item  d-flex justify-content-between admin-names">
                    <h5 class="admin-name">{{$user->name}}</h5>
                    <span>
                        <a href="" class="btn btn-info"  data-toggle="modal" data-target="#userinfo{{$user->id}}"><i class="fa fa-eye" aria-hidden="true"></i> Info</a>
                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteuser{{$user->id}} "><i class="fa fa-times" aria-hidden="true"></i> delete</a> 
                    </span>
                </li> 



                <div class="modal fade" id="deleteuser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteuser{{$user->id}}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="deleteuser{{$user->id}}Label">{{$user->name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                are you sure you wanna to delete this user
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="{{route("user.destroy",$user->id)}}" method="POST">
                            @csrf 
                            @method("DELETE") 
                            <input type="submit" value="delete" class="btn btn-danger"> 
                            </form>
                            </div>
                    </div>
                    </div>
                </div>





                <div class="modal fade" id="userinfo{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="userinfo{{$user->id}}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="userinfo{{$user->id}}Label">{{$user->name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center image-user"> <img src="{{ Gravatar::src($user->email) }}" > </div>
                                <h5 class=" admins"><strong>name : </strong>{{$user->name}} </h5>
                                <h5 class=" admins"><strong>email : </strong>{{$user->email}} </h5>
                                
                                <h5 class=" admins"><strong>register at :</strong>{{$user->created_at}} </h5>
                                <h5 class=" admins"><strong>updated profile at :</strong>{{$user->created_at}} </h5>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                            </div>
                    </div>
                    </div>
                </div>
                
                @endforeach

            </ul>
            
        </div>
    </div>
















    
    <div class="card my-3">
        <div class="card-header "> <h3><i class="fa fa-calculator" aria-hidden="true"></i> Categories </h3></div>
        <div class="card-body">
            <a href="{{route("category.index")}}" class="text-decoration-none">
                <div class="users-number text-center"> 
                    <div> 
                        <h3><i class="fa fa-calculator fa-4x" aria-hidden="true"></i>
                    </div>
                    {{$categoriesnumber}} 
                    
                </div>
                
                
            </a>  
            <h2 class="text-center my-5 last-users-title">last users</h2> 
            @foreach ($categories as $category)
                    <li class="list-group-item d-flex justify-content-between">
                        
                            
                        <span class="font-weight-bold">{{ $category->name}}</span>
                        
                        <span>
                            <a href="{{route("category.show",$category->id)}}" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i>posts</a>
                            <a href="{{route("category.edit",$category->id)}}" class="btn btn-success"> <i class="fa fa-edit" aria-hidden="true"></i>edit</a> 
                            <a class="btn btn-danger" style="color: #FFF"  data-toggle="modal" data-target="#deletecategory{{$category->id}}"> <i class="fa fa-times" aria-hidden="true"></i>delete</a>
                        </span>
                    </li>
                    <!-- Modal -->
                    <div class="modal fade" id="deletecategory{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="deletecategory{{$category->id}}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="deletecategory{{$category->id}}Label">delete  {{$category->name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                are you sure you want to delete this category 
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="{{route("category.destroy",$category->id)}}" method="POST">
                            @csrf
                            @method("DELETE") 
                            <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>







    <div class="card my-3">
        <div class="card-header "><h3><i class="fa fa-address-book-o fa-1x" aria-hidden="true"></i>  posts </h3></div>
        <div class="card-body"> 
            <a href="{{route("post.index")}}" class="text-decoration-none">
                <div class="users-number text-center"> 
                    <div> 
                        <h3><i class="fa fa-address-book-o fa-4x" aria-hidden="true"></i>
                    </div>
                    {{$postsnumber}} 
                    
                </div>
            </a>  
            <h2 class="text-center my-5 last-users-title">last posts</h2>   
            <ul class="list-group my-3">
                @foreach ($posts as $post)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>
                            <img class="post-image" src="{{asset("storage/$post->featured")}}" alt="not found">
                            <span>{{ $post->title}}</span>
                        </span>
                        <span>
                            <a href="{{route("post.show",$post->id)}}" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i> view</a>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header "><h3><i class="fa fa-tags fa-1x" aria-hidden="true"></i>  tags </h3></div>
        <div class="card-body">
            <div class="card-body"> 
                <a href="{{route("tag.index")}}" class="text-decoration-none">
                    <div class="users-number text-center"> 
                        <div> 
                            <h3><i class="fa fa-tags fa-4x" aria-hidden="true"></i>
                        </div>
                        {{$tagsnumber}} 
                        
                    </div>
                </a>  
                <h2 class="text-center my-5 last-users-title">last tags</h2>  
                <ul class="list-group my-3">
                    @foreach ($tags as $tag)
                        <li class="list-group-item d-flex justify-content-between">
                            
                                
                            <span class="font-weight-bold">{{ $tag->name}}</span>
                            
                            <span>
                                <a href="{{route("tag.show",$tag->id)}}" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i>posts</a>
                                <a href="{{route("tag.edit",$tag->id)}}" class="btn btn-success"> <i class="fa fa-edit" aria-hidden="true"></i>edit</a> 
                                <a class="btn btn-danger" style="color: #FFF"  data-toggle="modal" data-target="#deletetag{{$tag->id}}"> <i class="fa fa-times" aria-hidden="true"></i>delete</a>
                            </span>
                        </li>
                        <!-- Modal -->
                        <div class="modal fade" id="deletetag{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="deletetag{{$tag->id}}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="deletetag{{$tag->id}}Label">delete  {{$tag->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    are you sure you want to delete this tag 
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="{{route("tag.destroy",$tag->id)}}" method="POST">
                                @csrf
                                @method("DELETE") 
                                <button type="submit" class="btn btn-danger">delete</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
            
        </div>
    </div>
@endsection
@section('css')
    <style>
        .users-number{
            width: 40% ; 
            margin: 15px auto ; 
            border: 1px solid #EEE ; 
            padding:10px ; 
            border-radius: 10px ; 
            box-shadow: 2px 2px 5px #000 ; 
            font-size:25px ;  
            transition: all .4s ease-in-out ; 
        }
        .last-users-title {
            padding:10px ; 
            border-radius: 10px ; 
            box-shadow: 2px 2px 5px #000 ;
        }
        .users-number i {
            color: #3ee1bc 
        }
        .users-number:hover{
            transform: scale(1.1) ; 
        } 
        .post-image {
            width: 50px; 
            height: 50px;
            
        }
    </style>
@endsection