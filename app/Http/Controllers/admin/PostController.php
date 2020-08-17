<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\updatePostRequest;
use App\Notifications\PostAprrovedNotification;
use App\Post;
use App\Tag;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{  
    public function __construct()
    {
        $this->middleware(["deletepost"])->only(["destroy"]) ; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.posts.index")->with("posts",Post::paginate(15)) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.posts.create")->with("tags",Tag::all()) ; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    { 
        $image = $request->featured->store("posts") ; 
        $post=post::create([
            "title"=>$request->title , 
            "content"=>$request->content , 
            "country"=>$request->country ,
            "status"=>$request->status , 
            "price" => $request->price , 
            "coil"=>$request->coil , 
            "user_id"=>auth()->user()->id , 
            "approve"=>1 , 
            "category_id"=>$request->category, 
            "featured"=>$image 
        ]) ; 
        $post->tags()->attach($request->tags) ;
        session()->flash("success","post Created successfully") ; 
        return redirect(route("post.index")) ; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("admin.posts.show")->with("post",$post)  ; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {  
        return view("admin.posts.create")
        ->with("tags",Tag::all())
        ->with("post",$post) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updatePostRequest $request,Post $post)
    {
        if($request->hasFile("featured")){
            $post->deleteImage() ;
            $image = $request->featured->store("posts") ;
            $post->update([
                "title"=>$request->title , 
                "content"=>$request->content , 
                "country"=>$request->country ,
                "status"=>$request->status , 
                "price" => $request->price , 
                "coil"=>$request->coil , 
                "category_id"=>$request->category, 
                "featured"=>$image 
            ]) ; 
            $post->tags()->sync($request->tags) ;
            session()->flash("success","post updated successfully") ;  
            return redirect(route("post.index")) ; 
        }
        else {
            $post->update([
                "title"=>$request->title , 
                "content"=>$request->content , 
                "country"=>$request->country ,
                "status"=>$request->status , 
                "price" => $request->price , 
                "coil"=>$request->coil , 
                "category_id"=>$request->category
            ]) ; 
            $post->tags()->sync($request->tags) ;
            session()->flash("success","post updated successfully") ;  
            return redirect(route("post.index")) ;
            
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->deleteImage() ; 
        $post->delete() ; 
        session()->flash("success","post Deleted successfully") ;
        return redirect(route("post.index")) ; 
    }
    public function approve(Post $post){
            
            $post->update([
                "approve"=>1 
            ]) ;  
            if(!$post->user->isAdmin()) 
            {
                $post->user->notify(new PostAprrovedNotification($post)) ; 
            }
            session()->flash("success" , "post approved  successfully .") ; 
            return redirect()->back() ; 
    }
    public function unapprove(){    
        return view("admin.posts.index")
        ->with("posts" ,Post::where("approve",0)->paginate(20)) 
        ->with("unapproved" ,Post::where("approve",0)->count()); 

    }
}
