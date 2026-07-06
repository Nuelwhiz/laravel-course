<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\listings;
use App\Http\Controllers\ListingController;


//all listings
Route::get('/', [ListingController::class, 'index']);
   

// create listing
Route::get('/listings/create', [ListingController::class, 'create']);
//store listing
Route::post('/listings', [ListingController::class, 'store']);
//single listing

//edit listing
Route::post('/listings/{listings}', [ListingController::class, 'edit']);

//show listing
Route::get('/listing/{listings}', [ListingController::class, 'show']);




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

