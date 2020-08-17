<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/posts/{post}', 'PostController@show')->name("posts.show");
Route::get('/posts/tags/{tag}','tagController@poststag')->name("posts.tag");

Route::get("/category/{category}/posts","CategoryController@showposts")->name("category.posts") ; 
Route::get("/category/seachpost","CategoryController@seachpost")->name("category.seachpost") ;
//profile routes
Route::middleware(["auth"])->get("/posts/{post}/checkout" ,"PaymentController@checkout")->name("posts.pay") ; 
Route::middleware(["auth","checkUser"])->group(function(){
Route::get("/profile/{user}" , "UserProfileController@index")->name("profile.index") ; 
Route::get("/profile/{user}/edit" , "UserProfileController@edit")->name("profile.edit") ; 
Route::put("/profile/{user}/update" , "UserProfileController@update")->name("profile.update") ; 
Route::get("/profile/{user}/posts" , "UserProfileController@posts")->name("profile.posts") ; 
Route::get("/profile/{user}/waitposts" , "UserProfileController@waitposts")->name("profile.waitposts") ; 
Route::get("/profile/{user}/createpost" , "UserProfileController@createpost")->name("profile.createpost") ;
Route::post("/profile/{user}/store" , "UserProfileController@store")->name("profile.store") ;
Route::get("/profile/{user}/notifications" , "UserProfileController@notifications")->name("profile.notifications") ;
Route::middleware(["checkAuthOfPost"])->delete("/profile/{user}/{post}/delete" ,"UserProfileController@delete")->name("profile.deletepost"); 
Route::middleware(["checkAuthOfPost"])->get("/profile/{user}/{post}/edit" , "UserProfileController@editpost")->name("profile.editpost") ;
Route::middleware(["checkAuthOfPost"])->put("/profile/{user}/{post}/update" , "UserProfileController@updatepost")->name("profile.updatepost") ;
}) ; 


//admin routes
Route::middleware(["auth","admin"])->group(function(){
    Route::resource('/post', 'admin\PostController');
    Route::get("/post/{post}/approve" ,"admin\PostController@approve")->name("post.approve") ; 
    Route::get("/unapprove" ,"admin\PostController@unapprove")->name("post.unaproved") ;
    Route::resource('/category', 'admin\CategoryController');
    Route::resource('/tag', 'admin\tagController');
    Route::resource('/user', 'admin\UserController');
    Route::get("/user/{user}/showposts","admin\UserController@userposts")->name("user.posts") ; 
    Route::GET("/dashbord","admin\DashbordController@index")->name("dashbord.index") ;  

}) ; 

