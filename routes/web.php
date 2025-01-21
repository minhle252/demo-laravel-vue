<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    require base_path('routes/api.php');
});
Route::get('/admin/news/', function () {
    return view('welcome');
});
Route::get('/admin/news/{any}', function () {
    return view('welcome');
});
Route::get('/{any}', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});