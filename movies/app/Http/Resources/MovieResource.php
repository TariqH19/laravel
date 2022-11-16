<?php

namespace App\Http\Resources;

use App\Http\Resources\MovieResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //returns all database entities i will change this later so the json is formatted to what i want to display
        // return parent::toArray($request);
        return[
            'title' => $this->title,
            'genre' => $this->genre,
            'runtime' => $this->runtime,
            'director' => $this->director,
            'rating' => $this->rating,
            'description' => $this->description,
            'release_date' => $this->release_date,
            'image' => $this->image,
            'cinema_id'=>$this->cinema->id,
            'cinema_name'=>$this->cinema->name,
            'cinema_location'=>$this->cinema->location,
        ];
    }
}