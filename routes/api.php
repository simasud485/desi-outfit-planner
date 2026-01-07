<?php

use App\Http\Controllers\Api\RecommendationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', [RecommendationController::class, 'index']);

// use group to apply 'v1' prefixing for version facility
Route::prefix('v1')->group(function () {
    // define endpoint: /api/v1/recommend/{city}
    Route::get('/recommend/{city}', [RecommendationController::class, 'getRecommendation']);
});
