@extends('admin.layouts.app')
@section('title')
    category
@endsection
@section('categories')
    active
@endsection
@section('content')
    <div class="card my-3">
        <div class="card-header d-flex justify-content-between "> 
            <h3><i class="fa fa-calculator" aria-hidden="true"></i>  Categories </h3>
            <a href="{{route("category.create")}}" class="btn btn-success"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i> create category </a>
        </div>
        <div class="card-body">
            @if ($categories->count()==0)
                no posts created 
            @else 
            <ul class="list-group my-3">
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
            </ul>
            {{$categories->links()}} 
            @endif
        </div>
    </div>
    
@endsection
