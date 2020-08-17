@extends('admin.layouts.app')
@section('title')
    tags
@endsection
@section('tags')
    active
@endsection
@section('content')
    <div class="card my-3">
        <div class="card-header d-flex justify-content-between "> 
            <h3><i class="fa fa-tags" aria-hidden="true"></i>  tags </h3>
            <a href="{{route("tag.create")}}" class="btn btn-success"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i> create tag </a>
        </div>
        <div class="card-body">
            @if ($tags->count()==0)
                no tags created 
            @else 
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
            {{$tags->links()}} 
            @endif
        </div>
    </div>
    
@endsection
