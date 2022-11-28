<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

class AuthController extends Controller
{
    public function auth()
    {

        $payload = JWTFactory::sub(123)->aud('foo')->foo(['bar' => 'baz'])->make();

        $token=  JWTAuth::encode($payload);

       echo $token;
    }
}
