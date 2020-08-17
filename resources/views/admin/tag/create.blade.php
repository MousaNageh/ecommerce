@extends('admin.layouts.app')
@section('title')
    @isset($tag)
    edit tag 
    @else
    create tag 
    @endisset
@endsection
@section('categories')
    active
@endsection
@section('content')
    <div class="card my-3">
        <div class="card-header ">

            @isset($tag)
            <h3>edit tag</h3> 
            @else
            <h3>create tag</h3> 
            @endisset 
        </div>
        <div class="card-body">
            <form action="@isset($tag)
            {{route("tag.update",$tag->id)}}    
            @else
                {{route("tag.store")}}
            @endisset" method="POST">
            @csrf 
            @isset($tag)
            @method("PUT")
            @endisset
            <div class="form-group">
                <label for="name" class="col-form-label-sm font-weight-bold"> name * </label>
                <input type="text" name="name" id="name" class="form-control" @isset($tag)
                    value="{{$tag->name}}"
                @endisset>
            </div>
            <input type="submit" value="save" class="btn btn-success">
            </form>
            
        </div>
    </div>
@endsection
