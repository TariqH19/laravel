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
     * Display a list of all Movies.
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
    //This gets all movies it uses the movie collection not the resource
    public function index()
    {
        return new MovieCollection(Movie::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     *      * @OA\Post(
     *      path="/api/movies",
     *      operationId="store",
     *      tags={"Movies"},
     *      summary="Create a new Movie",
     *      description="Stores the movie in the DB",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"title", "genre", "runtime", "director", "rating","description","release_date","image"},
     *            @OA\Property(property="title", type="string", format="string", example="Sample Title"),
     *            @OA\Property(property="genre", type="string", format="string", example="Sample Genre"),
     *            @OA\Property(property="runtime", type="integer", format="integer", example="120"),
     *            @OA\Property(property="director", type="string", format="string", example="Sample Director"),
     *            @OA\Property(property="rating", type="float", format="float", example="7.2"),
     *            @OA\Property(property="description", type="string", format="string", example="A long description about this great movie"),
     *            @OA\Property(property="release_date", type="date", format="date", example="2022-05-05"),
     *            @OA\Property(property="image", type="string", format="string", example="https://picsum.photos/200/300"),
     *          )
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *     )
     * )
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //to store a movie in the database. I used the store function to store the movie and I specified what information needs the 
    //be sent so the movie is created. The information specified is the information that is in a protected fillable array in the 
    //movie Model. This prevents mass assignment. Once all relevant fields have been filled with the correct data the new movie is made. The Http method used is also post.
    //This creates a new movie and uses the movie resource
    public function store(Request $request)
    {
        
        $movie = Movie::create($request->only([
            'title','genre','runtime','director','rating','description','release_date','image'
        ]));
        return new MovieResource($movie);
    }

    /**
     * Display 1 movie by the id.
     * 
     *     * @OA\Get(
    *     path="/api/movies/{id}",
    *     description="Gets a movie by ID",
    *     tags={"Movies"},
    *          @OA\Parameter(
        *          name="id",
        *          description="Movie id",
        *          required=true,
        *          in="path",
        *          @OA\Schema(
        *              type="integer")
     *          ),
        *      @OA\Response(
        *          response=200,
        *          description="Successful operation"
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
    //to edit/ update an existing movie I used the update function. Like the store function I specify the fields that must be filled 
    //then instead of creating I am updating the movie. There is also a different Http method instead of using post I used put to 
    //update the movie.
    public function update(Request $request, Movie $movie)
    {
        $movie->update($request->only([
            'title','genre','runtime','director','rating','description','release_date','image'
        ]));

        return new MovieResource($movie);
    }

    /**
     *      * @OA\Delete(
     *    path="/api/movies/{id}",
     *    operationId="destroy",
     *    tags={"Movies"},
     *    summary="Delete a Movie",
     *    description="Delete Movie",
     *    @OA\Parameter(name="id", in="path", description="Id of a Movie", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Success",
     *         @OA\JsonContent(
     *         @OA\Property(property="status_code", type="integer", example="204"),
     *         @OA\Property(property="data",type="object")
     *          ),
     *       )
     *      )
     *  )
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    //to delete a movie from the database I used the destroy function. In this function I get the movie id, similar to the show 
    //function I used route model binding. This allows me to get the movies id and delete the movie. The Http method used is the 
    //delete method.
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->json(null,Response::HTTP_NO_CONTENT);
    }
}