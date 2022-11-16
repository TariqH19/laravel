<?php

namespace App\Models;

use App\Models\Movie;
use App\Models\Cinema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;
    //This is what needs to be filled if it isn't there will be an error
    //This also prevents mass assignment, this is when a collumn in your database is changed that you didn't expect
    protected $fillable = ['title','genre','runtime','director','rating','description','release_date','image','cinema_id'];

public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

}