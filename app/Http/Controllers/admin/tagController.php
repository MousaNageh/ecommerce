<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\CreateTagRequest;
use App\Tag;
use Illuminate\Http\Request;

class tagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.tag.index")->with("tags",Tag::paginate(15)) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.tag.create") ; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        Tag::create([
            "name"=>$request->name
        ]) ;
        session()->flash("success","tag Created successfully.") ; 
        return redirect(route("tag.index")) ; 
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view("admin.posts.index")
        ->with("posts" , $tag->posts()->paginate(15))
        ->with("tagname",$tag->name) ; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view("admin.tag.create")->with("tag",$tag) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTagRequest $request, Tag $tag)
    {
        $tag->update([
            "name"=>$request->name
            ]) ; 
        session()->flash("success","tag updated successfully .") ; 
        return redirect(route("tag.index")) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete() ; 
        session()->flash("success","tag deleted successfully .") ; 
        return redirect(route("tag.index")) ;
    }
}
