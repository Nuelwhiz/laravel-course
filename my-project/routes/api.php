<?php

use Illuminate\Support\Facades\Route;

Route::get('/postes', function(){
    return response()->json([
        'posts' =>[
            [
                'title' => 'my first post',
            ]
        ]
    ]);
});