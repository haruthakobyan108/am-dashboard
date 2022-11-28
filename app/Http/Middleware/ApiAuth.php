<?php

namespace App\Http\Middleware;

use App\Services\EncryptionService;
use Closure;
use Illuminate\Http\Request;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (!empty($request->header('token')) && EncryptionService::canDecrypt($request->header('token')) !== false){
            return $next($request);
        }
        if ($request->expectsJson()){
            return  response(['code' => 401, 'message' => 'Unauthenticated']);
        }

        if ($request->wantsJson()){
            return  response()->json(['code' => 401], 200, 401);
        }
        abort(401, 'forbidden', ['code'=>401]);
    }
}

