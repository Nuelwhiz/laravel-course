<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\listings;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

//all listings
Route::get('/', [ListingController::class, 'index']);
   

// create listing
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//store listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
;

//edit listing
//Route::get('/listing/{id}/edit', [ListingController::class, 'edit']);
Route::get('/listing/{listings}/edit', [ListingController::class, 'edit'])->middleware('auth');

//update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//show listing
Route::get('/listing/{listings}', [ListingController::class, 'show']);

//manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//delete listing
Route::delete('/listing/{listings}', [ListingController::class, 'destroy'])->middleware('auth');


//show register and create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
//create new user
Route::post('/users', [UserController::class, 'store']);

//logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
;

//login user

Route::post('/users/authenticate', [UserController::class, 'authenticate']);


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

