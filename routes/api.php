<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tokens/create', function (Request $request) {
    $token = User::where('name','api')->first()->createToken('front-end-1');
     
    echo $token->plainTextToken;    
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});