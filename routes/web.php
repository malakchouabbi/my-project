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
 
use App\Http\Controllers\OdsPrintController;

Route::get('/ods/{ods}/imprimer', [OdsPrintController::class, 'imprimer'])->name('ods.imprimer');
