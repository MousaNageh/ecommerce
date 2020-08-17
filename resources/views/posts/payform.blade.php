@extends('layouts.app') 
@section('title')
{{ $post->title}} 
@endsection 


@section('content')
<div class="container">
    <div class="card my-5">
        <div class="card-header">
            <h3>{{$post->title}}</h3>
        </div>
        <div class="card-body">
            <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$checkoutID}}"></script>
            <form action="{{route("posts.show",$post->id)}}" class="paymentWidgets" data-brands="VISA MASTER AMEX MADA "></form>
        </div>
    </div>
</div>
@endsection 



