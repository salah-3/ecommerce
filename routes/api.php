<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get("/categories",[CategorieController::class,'index']);
Route::post("/categorie",[CategorieController::class,'store']);
Route::get("/categorie/{id}",[CategorieController::class,'show']);
Route::Delete("/categorie/{id}",[CategorieController::class,'destroy']);
Route::put("/categorie/{id}",[CategorieController::class,'update']);

Route::middleware('api')->group(function () {
    Route::resource('scategories', ScategorieController::class); 
});

Route::get('/scat/{idcat}', [ScategorieController::class,'showSCategorieByCAT']);

Route::middleware('api')->group(function () {
    Route::resource('articles', ArticleController::class); 
});

Route::get('/articles/art/articlespaginate', [ArticleController::class,'articlesPaginate']);