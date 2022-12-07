<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $method = $this->method();

        if($method == 'PUT'){

            return [
                'title'=>['required'],
                'genre'=>['required'],
                'runtime'=>['required'],
                'director'=>['required'],
                'rating'=>['required'],
                'description'=>['required'],
                'release_date'=>['required'],
                'image'=>['required'],
                'cinema_id'=>['required'],
                'cinema_name'=>['required'],
                'cinema_location'=>['required'],
                'actors'=>['required'],
            ];
        }else{

            return [
                'title'=>['sometimes','required'],
                'genre'=>['sometimes','required'],
                'runtime'=>['sometimes','required'],
                'director'=>['sometimes','required'],
                'rating'=>['sometimes','required'],
                'description'=>['sometimes','required'],
                'release_date'=>['sometimes','required'],
                'image'=>['sometimes','required'],
                'cinema_id'=>['sometimes','required'],
                'cinema_name'=>['sometimes','required'],
                'cinema_location'=>['sometimes','required'],
                'actors'=>['sometimes','required'],
                
            ];
        }

    }
}