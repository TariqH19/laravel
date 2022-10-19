<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\MovieResource;
use App\Http\Resources\MovieCollection;
use App\Http\Controllers\MovieController;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *  * @OA\Get(
 *     path="/api/movies",
 *     description="Displays all the movies",
 *     tags={"Movies"},
     *      @OA\Response(
        *          response=200,
        *          description="Successful operation, Returns a list of Movies in JSON format"
        *       ),
        *      @OA\Response(
        *          response=401,
        *          description="Unauthenticated",
        *      ),
        *      @OA\Response(
        *          response=403,
        *          description="Forbidden"
        *      )
 * )
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new MovieCollection(Movie::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //code to store a movie
        $movie = Movie::create($request->only([
            'title','genre','runtime','director','rating','description','release_date'
        ]));
        return new MovieResource($movie);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\MovieResource
     */
    public function show(Movie $movie)
    {
        return new MovieResource($movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        // $movie->update($request->only([
        //     'title','genre','runtime','director','rating','description','release_date'
        // ]));

        // return new MovieResource($movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        // $movie->delete();
        // return response()->json(null,Response::HTTP_NO_CONTENT);
    }
}