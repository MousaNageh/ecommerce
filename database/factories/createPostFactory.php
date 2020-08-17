<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        "title"=>$faker->sentence(5) , 
                "content"=>$faker->text(2000) , 
                "country"=>$faker->country() ,
                "status"=>$faker->randomElement($array =  array("new" , "like new" , "used" , "old" , "very old")) , 
                "price" => $faker->randomElement    ($array= array(100,200,300,400,500,600)) , 
                "coil"=>$faker->randomElement($array =  array("dollar" , "pound" , "euro")) , 
                "category_id"=>$faker->randomElement($array= array(1    ,2,3,4)), 
                "featured"=>"posts/1.jpeg"  , 
                "approve"=>1  , 
                "user_id"=> 1    
    ];
});
