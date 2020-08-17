<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view("admin.users.index")
        ->with("admins",User::where("admin",1)->get())
        ->with("users",User::where("admin",0)->paginate(30)) ; 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.create") ; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        User::create([
            "name"=>$request->name , 
            "email"=>$request->email , 
            "password"=>Hash::make($request->password) , 
            "admin"=>$request->authorize 
        ]) ;  
        if($request->authorize == 1) 
        session()->flash("success", "admin created successfully . ") ; 
        else
        session()->flash("success", "user created successfully . ") ;
        return redirect(route("user.index")) ; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("admin.users.create")->with("user" , $user) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($request->password)
        {
            $request->validate([
                "name"=>"required|string" , 
                "email"=>"required|email|unique:users,email,$user->id" , 
                "password"=>"required|min:8|confirmed",
                "authorize"=>"required" 
            ]) ; 
            $user->update([
                "name"=>$request->name , 
                "email"=>$request->email , 
                "password"=>Hash::make($request->password) , 
                "admin"=>$request->authorize 
            ]) ; 
            if($request->authorize == 1) 
            session()->flash("success", "admin updated successfully . ") ; 
            else
            session()->flash("success", "user updated successfully . ") ;
            return redirect(route("user.index")) ; 
        }
        else 
        {
            $request->validate([
                "name"=>"required|string" , 
                "email"=>"required|email|unique:users,email,$user->id" , 
                "authorize"=>"required" 
            ]) ; 
            $user->update([
                "name"=>$request->name , 
                "email"=>$request->email , 
                "admin"=>$request->authorize 
            ]) ; 
            if($request->authorize == 1) 
            session()->flash("success", "admin updated successfully . ") ; 
            else
            session()->flash("success", "user updated successfully . ") ;
            return redirect(route("user.index")) ; 
            
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete() ; 
        if($user->admin == 1) 
            session()->flash("success", "admin deleted successfully . ") ; 
            else
            session()->flash("success", "user deleted successfully . ") ;
            return redirect()->back() ;
    }
    public function userposts(User $user){
            return view("admin.posts.index")
            ->with("posts",$user->posts()->paginate(15))
            ->with("user",$user->name) ; 
            ; 
    }
}
