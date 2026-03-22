<?php


use App\Http\Controllers\Api\V1\PostController as PostControllerV1;
use App\Http\Controllers\Api\V2\PostController as PostControllerV2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function(){
    return ["message" => "YOW!"];
});

Route::prefix("v1")->group(function () {
    Route::apiResource("post", PostControllerV1::class);
});

Route::prefix("v2")->group(function () {
    Route::apiResource("post", PostControllerV2::class);
});