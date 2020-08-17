<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashbordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view("admin.dashbord")
        ->with("usersnumber" , User::all()->count()) 
        ->with("lastusers",DB::table('users')->where("admin",0)->orderByDesc("created_at")->limit(20)->get())
        ->with("categoriesnumber" , Category::all()->count()) 
        ->with("categories", DB::table('categories')->orderByDesc("created_at")->limit(5)->get())
        ->with("postsnumber" , Post::all()->count()) 
        ->with("posts", DB::table('posts')->orderByDesc("created_at")->limit(20)->get())
        ->with("tagsnumber" , Tag::all()->count()) 
        ->with("tags", DB::table('tags')->orderByDesc("created_at")->limit(20)->get()); 
    }


}
