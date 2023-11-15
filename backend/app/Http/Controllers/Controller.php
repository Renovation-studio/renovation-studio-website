<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *    title="API for renovation studio project",
 *    version="1.0.0",
 * )
 * @OA\SecurityScheme(
 *     type="http",
 *     in="cookie",
 *     name="session",
 *     securityScheme="cookieSessionAuth",
 *     scheme="basic"
 * )

 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
