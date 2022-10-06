<?php

namespace App\Http\Resources;

use App\Http\Resources\MovieCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MovieCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            //the creator of the api
            'data' => $this->collection,
            'version'=>'1.0.0',
            'author'=>'Tariq Horan'
        ];
    }
}