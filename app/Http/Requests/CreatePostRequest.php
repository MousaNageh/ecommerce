<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title"=>"required|string" , 
            "content"=>"required|string|min:150" ,
            "country"=>"required|string" , 
            "status"=>"required|string", 
            "category"=>"required|string" , 
            "price"=>"integer|required" , 
            "coil"=>"required|string" , 
            "featured"=>"required|image" , 
            "tags"=>"required" 

        ];
    }
}
