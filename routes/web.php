<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

use Illuminate\Support\Facades\Storage;

Route::get('/test-storage', function () {
    $files = Storage::disk('public')->files('uploads/csv');
    
    return response()->json($files);
});
 
