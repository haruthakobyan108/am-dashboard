<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\EncryptionService;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['apiAuth:api']], function() {
//    Route::post('/auth/login', [AuthController::class, 'auth']);
    Route::get('/getStreamerReport', [ReportController::class, 'getStreamerReport']);
//    Route::get('/keyGenerate', function(){
//        return  EncryptionService::decrypt('hvNiQcANaQChVVLFnNBbPcSq8yj+YLyg8Uh+g18lpEhcG9CDANGjwsDQ/wpjeRnIHugTDiRSv0oDw5q9g8ikDA==');
//    });
});
