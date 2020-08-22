<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{ 
    public function index(User $user){ 
        
        return view("profile.order")
        ->with("orders",$user->orders->count())
        ->with("unrecievedOrders",$user->orders()->where("recieved",0)->count())
        ->with("recievedOders",$user->orders()->where("recieved",1)->count())
        ->with("posts",Post::where("user_id",$user->orders()->first()->owner_id)->get()) ;  
        
    }
}
