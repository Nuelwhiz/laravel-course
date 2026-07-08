<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\listings;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;

//all listings
Route::get('/', [ListingController::class, 'index']);
   

// create listing
Route::get('/listings/create', [ListingController::class, 'create']);

//store listing
Route::post('/listings', [ListingController::class, 'store']);

//edit listing
//Route::get('/listing/{id}/edit', [ListingController::class, 'edit']);
Route::get('/listing/{listings}/edit', [ListingController::class, 'edit']);

//update listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//show listing
Route::get('/listing/{listings}', [ListingController::class, 'show']);

//delete listing
Route::delete('/listing/{listings}', [ListingController::class, 'destroy']);

//create listing user
Route::get('/register', [UserController::class, 'create']);

//create user
Route::post('/users', [UserController::class, 'store']);

//logout
Route::post('/logout', [UserController::class, 'logout']);


//intro
Route::get('/hello', function (){
    return response ('<h1>hello world</h1>', 300)
    ->header('content-type', 'text/plain')
    ->header('foo', 'bar');
});

Route::get('/posts/{id}', function($id){
    //dd($id);
    //ddd($id);
    return response('post ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function(Request $request){
    return $request->name . ' ' . $request->city;
});

