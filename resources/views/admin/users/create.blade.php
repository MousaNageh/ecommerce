@extends('admin.layouts.app')
@section('title')
    @isset($user)
        edit profile
    @else
        create admin/user 
    @endisset

@endsection
@section('users')
    active
@endsection
@section('content')
    <div class="card my-3">
        <div class="card-header">
            <h3><i class="fa fa-user" aria-hidden="true"></i>  @isset($user)
                edit profile
            @else
                create admin/user 
            @endisset
         </h3>
        </div>
        <div class="card-body">
            <form action="
            @isset($user)
            {{ route("user.update",$user->id)}}
            @else 
                {{route("user.store")}}
            @endisset" method="POST">
            @csrf 
            @isset($user)
                @method("PUT")
            @endisset
            <div class="form-group">
                <label for="name" class="font-weight-bold" > name</label>
                <input type="text" name="name" id="name" @isset($user) value="{{$user->name}} " @endisset class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="font-weight-bold"> email</label>
                <input type="email" name="email" id="email" @isset($user->email) value="{{$user->email}}"  @endisset class="form-control @error('email') is-invalid @enderror" >
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="font-weight-bold"> password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" autocomplete="off">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm" class="font-weight-bold">again password</label>
                <input type="password" name="password_confirmation" id="password-confirm" class="form-control" autocomplete="off">
                
            </div>
            <div class="form-group">
                <label for="authorize" class="font-weight-bold">user/admin</label>
                <select name="authorize" class="form-control @error('authorize') is-invalid @enderror">
                    <option value="">..</option>
                    <option value="0" @isset($user) @if($user->admin==0) selected @endif @endisset> user</option>
                    <option value="1" @isset($user) @if($user->admin==1) selected @endif @endisset> admin</option>
                </select>
                @error('authorize')
                    <span class="invalid-feedback" role="alert">
                        <strong> authorization is required </strong>
                    </span>
                @enderror
            </div>
            <input type="submit" value="save" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection

