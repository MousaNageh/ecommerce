@extends('admin.layouts.app')
@section('title')
    users/admin
@endsection
@section('users')
    active
@endsection
@section('content')
    <div class="card my-3">
        <div class="card-header">
            <h3><i class="fa fa-users" aria-hidden="true"></i> users and admins</h3>
        </div>
        <div class="card-body">
            <h4 class="text-center admins">admins</h4>
            <ul class="list-group">
                @foreach ($admins as $admin)
                    <li class="list-group-item  d-flex justify-content-between admin-names ">
                        <h5 class="admin-name">{{$admin->name}}</h5>
                        <span>
                            <a href="" class="btn btn-info" data-toggle="modal" data-target="#admininfo{{$admin->id}}">Info</a>
                            @if ($admin->email != "200moussa200@gmail.com")
                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteAdmin{{$admin->id}}">delete</a>
                            @endif 
                            @if (auth()->user()->email==$admin->email)
                            <a href="{{route("user.edit",$admin->id)}}" class="btn btn-success">Edit</a>
                            @endif
                        </span>
                    </li>

                <!-- delete model Modal -->

                    <div class="modal fade" id="deleteAdmin{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteAdmin{{$admin->id}}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="deleteAdmin{{$admin->id}}Label">{{$admin->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    are you sure you wanna to delete this Admin
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="{{route("user.destroy",$admin->id)}}" method="POST">
                                @csrf 
                                @method("DELETE") 
                                <input type="submit" value="delete" class="btn btn-danger"> 
                                </form>
                                </div>
                        </div>
                        </div>
                    </div>

                <!-- info model Modal -->
    <div class="modal fade" id="admininfo{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="admininfo{{$admin->id}}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="admininfo{{$admin->id}}Label">{{$admin->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="text-center image-user"> <img src="{{ Gravatar::src($admin->email) }}" > </div>
                    <h5 class=" admins"><strong>name : </strong>{{$admin->name}} </h5>
                    <h5 class=" admins"><strong>email : </strong>{{$admin->email}} </h5>
                    <h5 class=" admins d-flex justify-content-between">
                        <span>
                            <strong>number of posts : </strong> {{ $admin->posts->count()}} 
                        </span>
                        @if ($admin->posts->count()>0)
                        <a href="{{route("user.posts",$admin->id)}}" class="btn btn-info"> posts</a>
                        @endif
                    </h5>
                    <h5 class=" admins"><strong>register at :</strong>{{$admin->created_at}} </h5>
                    <h5 class=" admins"><strong>updated profile at :</strong>{{$admin->created_at}} </h5>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
                </div>
        </div>
        </div>
    </div>
                @endforeach
            </ul>
            <a href="{{route("user.create")}}" class="btn btn-success my-3"> add admin </a>
            <div class="dropdown-divider my-5 divider"></div>
            <h4 class="text-center admins">users</h4>
            <ul class="list-group">
                @foreach ($users as $user)
                    <li class="list-group-item  d-flex justify-content-between admin-names">
                        <h5 class="admin-name">{{$user->name}}</h5>
                        <span>
                            <a href="" class="btn btn-info"  data-toggle="modal" data-target="#userinfo{{$user->id}}">Info</a>
                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteuser{{$user->id}}">delete</a> 
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
                                    <h5 class="admins"><strong>name : </strong>{{$user->name}} </h5>
                                    <h5 class="admins"><strong>email : </strong>{{$user->email}} </h5>
                                    <h5 class="admins d-flex justify-content-between">
                                        <span>
                                            <strong>number of posts : </strong> {{ $user->posts->count()}} 
                                        </span>
                                        @if ($user->posts->count()>0)
                                        <a href="{{route("user.posts",$user->id)}}" class="btn btn-info"> posts</a>
                                        @endif
                                    </h5>
                                    <h5 class="admins"><strong>register at :</strong>{{$user->created_at}} </h5>
                                    <h5 class="admins"><strong>updated profile at :</strong>{{$user->created_at}} </h5>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                
                                </div>
                        </div>
                        </div>
                    </div>
                



                @endforeach
                <div class="my-3">
                    {{$users->links()}}
                </div>
            </ul>
            <a href="{{route("user.create")}}" class="btn btn-success my-3"> add user </a>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .admins{
            padding: 10px ; 
            border:1px solid #EEE  ; 
            box-shadow: 2px 2px 4px #000 ; 
            border-radius: 20px ; 
            margin-bottom:30px ; 
        }
        .admin-name{
            line-height: 1.8em
        }
        .divider{
            border-top: 2px solid #c498e7;
        }
        .image-user {
            width: 80% ; 
            margin: 10px auto ; 
        }
        .image-user img {
            max-width: 100% ; 
        }
        .admin{
            box-shadow: 2px 2px 4px #000 ; 
        }
        
        
    </style>
@endsection
