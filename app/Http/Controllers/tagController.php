<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class tagController extends Controller
{
    public function poststag(Tag $tag){
        return view("categories.index")
        ->with("posts",$tag->posts()->where("approve",1)->orderbyDesc("created_at")->paginate(24))
        ->with("tag",$tag->name)
        ;
    }
}
