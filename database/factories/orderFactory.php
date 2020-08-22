<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Order;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        "customer_id"=>function(){
            return User::all()->random() ; 
        },
        "owner_id"=>1 ,
        "post_id"=>function(){
            return Post::all()->random();  
        } 
    ];
});
