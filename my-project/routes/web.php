<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\listings;


//all listings
Route::get('/', function () {
    return view('listing', [
        'heading' => 'latest listing',
        'listing'=>Listing::all()   
    ]);
});


//single listing
Route::get('/listing/{listings}', function(Listing $listings){
  return view('listings', [
'listings' => $listings
    ]);
});

//intro
Route::get('/hello', function (){
    return response ('<h1>hello world</h1>', 200)
    ->header('content-type', 'text/plain')
    ->header('foo', 'bar');
});

Route::get('/posts/{id}', function($id){
    //ddd($id);
    return response('post ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function(Request $request){
    return $request->name . ' ' . $request->city;
});

