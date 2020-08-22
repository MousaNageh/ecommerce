<?php

namespace App\Http\Controllers;

use App\Notifications\OrderNotification;
use App\Order;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{ 
    public function __construct()
    {
        $this->middleware(["auth"])->only(["userpost"]) ; 
    }
    private function paymentStatus($id ,Post $post){
        $url = "https://test.oppwa.com/v1/checkouts/$id/payment";
	    $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
        if(isset(json_decode($responseData)->id))
        {
            Order::create([
                "customer_id"=>auth()->user()->id ,
                "owner_id"=>$post->user_id , 
                "post_id"=>$post->id   
            ]) ;
            $post->user->notify(new OrderNotification($post)) ; 
            session()->flash("success","you payment completed succeffully") ;  
        }
        else
        {
            session()->flash("failed","you payment not completed please try again ") ; 
        } 
        
        
        return view("posts.show")
            ->with("post" ,$post) 
            ->with("tags",$post->tags);
    }
    public function show(Post $post) 
    {
        if( request()->query("id") && request()->query("resourcePath")){
            return $this->paymentStatus(request()->query("id") ,$post) ; 
        }
        else 
        { 
            return view("posts.show")
            ->with("post" ,$post) 
            ->with("tags",$post->tags); 
        }
        
    }

    
}
