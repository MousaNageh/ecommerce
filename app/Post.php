<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Post extends Model
{
    protected $fillable =["title","content","user_id","category_id","featured","price", "approve", "coil","status","country"] ; 
    public function user(){
        return $this->belongsTo(User::class,"user_id") ; 
    }
    public function category(){
        return $this->belongsTo(Category::class) ; 
    }
    public function tags(){
        return $this->belongsToMany(Tag::class) ; 
    }
    public function deleteImage(){
        Storage::delete($this->featured) ; 
    } 
    public function scopePostserch($builder){
        $request = request()->query("post") ; 
        if(empty($request))
            return $builder ; 
        
        else 
            return $builder->where("title","LiKE","%$request%")->orderByDesc("created_at") ; 
        
        
    }
    
}
