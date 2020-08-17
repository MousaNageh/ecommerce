<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Notifications\CreatePostNotfication;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index(User $user) {
        return view("profile.index")->with("user",$user) ; 
    }
    public function edit(User $user) {
        
        return view("profile.edit")->with("user", $user) ; 
    }
    public function update(Request $request , User $user){
        if($request->password)
        {
            $request->validate([
                "name"=>"required|string" , 
                "email"=>"required|email|unique:users,email,$user->id" , 
                "password"=>"required|min:8|confirmed",
            ]) ; 
            $user->update([
                "name"=>$request->name , 
                "email"=>$request->email , 
                "password"=>Hash::make($request->password)  
                
            ]) ; 
            session()->flash("success", "your profile updated successfully . ") ;
            return redirect(route("profile.index",$user->id)) ;  
        }
        else 
        { 
            $request->validate([
                "name"=>"required|string" , 
                "email"=>"required|email|unique:users,email,$user->id" , 
            ]) ; 
            $user->update([
                "name"=>$request->name , 
                "email"=>$request->email ,  
                
            ]) ; 
            session()->flash("success", "your profile updated successfully . ") ;
            return redirect(route("profile.index",$user->id)) ;  

        }
    }
    public function posts(User $user) {
        return view("profile.userposts")->with("posts",$user->posts()->where("approve",1)->orderByDesc("created_at")->paginate(12)) ; 
    }
    public function waitposts(User $user){
        return view("profile.userposts")
        ->with("posts",$user->posts()->where("approve",0)->orderByDesc("created_at")->paginate(12))
        ->with("wait",true) ;
    }
    public function createpost(){
        return view("profile.create")->with("tags",Tag::all()) ; 
    }
    public function store(CreatePostRequest $request){
        $image = $request->featured->store("posts") ; 
        $post=Post::create([
            "title"=>$request->title , 
            "content"=>$request->content , 
            "country"=>$request->country ,
            "status"=>$request->status , 
            "price" => $request->price , 
            "coil"=>$request->coil , 
            "user_id"=>auth()->user()->id , 
            "category_id"=>$request->category, 
            "featured"=>$image 
        ]) ; 
        $post->tags()->attach($request->tags) ;
        session()->flash("success","post Created successfully and you have to wait untill approve this post from admin") ; 
        if(!auth()->user()->isAdmin()){
            auth()->user()->notify(new CreatePostNotfication($post)) ; 
        }
        return redirect(route("profile.waitposts",auth()->user()->id)) ;
    }
    public function editpost(User $user , Post $post){ 
        
        return view("profile.create")
        ->with("tags",Tag::all())   
        ->with("post",$post) ; 
    }
    public function updatepost(Request $request,User $user , Post $post){
        if($request->hasFile("featured")){
            $request->validate([
                "title"=>"required|string" , 
                "content"=>"required|string|min:150" ,
                "country"=>"required|string" , 
                "status"=>"required|string", 
                "category"=>"required|string" , 
                "price"=>"integer|required" , 
                "coil"=>"required|string" , 
                "featured"=>"required|image" , 
                "tags"=>"required" 
            ]) ; 

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
            return redirect(route("posts.show",$post->id)) ; 
        }
        else {
            $request->validate([
                "title"=>"required|string" , 
                "content"=>"required|string|min:150" ,
                "country"=>"required|string" , 
                "status"=>"required|string", 
                "category"=>"required|string" , 
                "price"=>"integer|required" , 
                "coil"=>"required|string" ,  
                "tags"=>"required" 
            ]) ; 
            $post->update([
                "title"=>$request->title , 
                "content"=>$request->content , 
                "country"=>$request->country ,
                "status"=>$request->status , 
                "price" => $request->price , 
                "coil"=>$request->coil , 
                "category_id"=>$request->category
            ]) ; 
            $post->tags()->sync ($request->tags) ;
            session()->flash("success","post updated successfully") ;  
            return redirect(route("posts.show",$post->id)) ; 
        }
    }
    public function delete(User $user , Post $post) {
        $post->deleteImage() ; 
        $post->delete() ; 
        session()->flash("success","post Deleted successfully") ;
        return redirect()->back() ; 
    }
    public function notifications(User $user){
        
        auth()->user()->unreadNotifications->markAsRead();
        return view("profile.notifications")->with("notifications",auth()->user()->notifications()->orderByDesc("created_at")->paginate(15)) ; 
    }
}
