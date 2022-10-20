<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      x={
 *          "logo":{
 *              "url": "https://via.placeholder.com/190x90.png?text=L5-Swagger"
 *          }
 *      },
 *      
 *      title="Movie API",
 *      description="Tariq CA1 Movie API",
 *      @OA\Contact(
 *          email="N00202437@iadt.ie"
 *      ),
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}