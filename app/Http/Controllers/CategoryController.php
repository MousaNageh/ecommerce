<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{ 
    
    public function showposts(Category $category){
            return view("categories.index")
            ->with("posts",$category->post()->where("approve",1)->orderByDesc("created_at")->paginate(24)) 
            ->with("category",$category); 
    }
    public function seachpost(){
        return view("categories.index")
        ->with("posts",Post::Postserch()->paginate(24))
        ->with("search",request()->query("post")) ; 
        ;  
    }
}
