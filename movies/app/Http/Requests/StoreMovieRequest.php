<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'release_date'=>['required'],
            'actors'=>['required', 'exists:actors,id']
        ];
    }
}