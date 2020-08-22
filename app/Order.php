<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=["customer_id","owner_id","post_id","recieved"] ;  
    public function owner(){
        return $this->belongsTo(User::class ,"owner_id") ; 
    }
    public function customer(){
        return $this->belongsTo(User::class, "customer_id") ; 
    }
    public function posts(){
        return $this->belongsTo(Post::class,"post_id") ;
    }
}
