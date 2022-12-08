<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\CinemaResource;
use App\Http\Resources\CinemaCollection;
use App\Http\Requests\UpdateCinemaRequest;

class CinemaController extends Controller
{
    /**
     * Display a list of all Cinemas.
     *
     *  * @OA\Get(
 *     path="/api/cinemas",
 *     description="Displays all the cinemas",
 *     tags={"Cinemas"},
     *      @OA\Response(
        *          response=200,
        *          description="Successful operation, Returns a list of Cinemas in JSON format"
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
        //
        return new CinemaCollection(Cinema::paginate(1));
    }
 
/**
     * Store a newly created resource in storage.
     *
     *      * @OA\Post(
     *      path="/api/cinemas",
     *      operationId="storeCinema",
     *      tags={"Cinemas"},
     *      summary="Create a new Cinema",
     *      description="Stores the cinema in the DB",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"name", "location"},
     *            @OA\Property(property="name", type="string", format="string", example="Sample name"),
     *            @OA\Property(property="location", type="string", format="string", example="Sample location"),
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
    public function store(Request $request)
    {
        $cinema = Cinema::create([
            'name'=>$request->name,
            'location'=>$request->location
        ]);

        return new CinemaResource($cinema);
    }

    /**
     * Display 1 cinema by the id.
     * 
     *     * @OA\Get(
    *     path="/api/cinemas/{id}",
    *     description="Gets a cinema by ID",
    *     tags={"Cinemas"},
    *          @OA\Parameter(
        *          name="id",
        *          description="Cinema id",
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
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\CinemaResource
     */
    public function show(Cinema $cinema)
    {
        return new CinemaResource($cinema);
    }

    /**
    * @OA\Put(
    *      path="/api/cinemas/{id}",
    *      operationId="update",
    *      tags={"Cinemas"},
    *      summary="Update a Cinema",
    *      description="Stores the cinema in the DB",
    *         @OA\Parameter(
    *          name="id",
    *          description="Cinema id",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *          type="integer")
    *          ),
    *      @OA\RequestBody(
    *         required=true,
    *         @OA\JsonContent(
    *            required={"name", "location"},
     *            @OA\Property(property="name", type="string", format="string", example="Sample name"),
     *            @OA\Property(property="location", type="string", format="string", example="Sample location"),
    *          )
    *      ),
    *     @OA\Response(
    *          response=200, description="Success",
    *          @OA\JsonContent(
    *             @OA\Property(property="status", type="integer", example=""),
    *             @OA\Property(property="data",type="object")
    *          )
    *      )
    * )
    * 
    * Update the specified resource in the cinema table.
    * The user sends a put request though the URL. This gets request will display all the cinemas in the cinema table. 
    * Using the route defined in the API.php it calls the update function in the cinema controller. 
    * From here it takes all the data that was given by the user and stores it in the $cinema variable and 
    * then sends the data in the variable to the cinema collection. However, using the put request will completely delete and recreate.   
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Cinema  $cinema
    * @return \Illuminate\Http\Response
    */
    public function update(UpdateCinemaRequest $request, Cinema $cinema)
    {
        $cinema->update($request->all());
    }

    /**
     *      * @OA\Delete(
     *    path="/api/cinemas/{id}",
     *    operationId="destroyCinema",
     *    tags={"Cinemas"},
     *    summary="Delete a Cinema",
     *    description="Delete Cinema",
     *    @OA\Parameter(name="id", in="path", description="Id of a Cinema", required=true,
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
     *    )
     *    )
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    //to delete a cinema from the database I used the destroy function. In this function I get the cinema id, similar to the show 
    //function I used route model binding. This allows me to get the cinemas id and delete the cinema. The Http method used is the 
    //delete method.
    public function destroy(Cinema $cinema)
    {
        $cinema->delete();
        return response()->json(null,Response::HTTP_NO_CONTENT);
    }
}