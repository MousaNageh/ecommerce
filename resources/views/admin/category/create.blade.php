@extends('admin.layouts.app')
@section('title')
    @isset($category)
    edit category 
    @else
    create category 
    @endisset
@endsection
@section('categories')
    active
@endsection
@section('content')
    <div class="card my-3">
        <div class="card-header ">

            @isset($category)
            <h3>edit category</h3> 
            @else
            <h3>create category</h3> 
            @endisset 
        </div>
        <div class="card-body">
            <form action="@isset($category)
            {{route("category.update",$category->id)}}    
            @else
                {{route("category.store")}}
            @endisset" method="POST">
            @csrf 
            @isset($category)
            @method("PUT")
            @endisset
            <div class="form-group">
                <label for="name" class="col-form-label-sm font-weight-bold"> name * </label>
                <input type="text" name="name" id="name" class="form-control" @isset($category)
                    value="{{$category->name}}"
                @endisset>
            </div>
            <input type="submit" value="save" class="btn btn-success">
            </form>
            
        </div>
    </div>
@endsection
