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
        return parent::toArray($request);
    }
}