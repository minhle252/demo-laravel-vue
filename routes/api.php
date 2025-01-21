<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\DisableCsrfMiddleware;

Route::middleware([DisableCsrfMiddleware::class])->group(function () {
    
    Route::post('/news/upload', [ApiController::class, 'uploadImage']);
    Route::delete('/news/{id}', [ApiController::class, 'destroy']);
    Route::put('/news/{id}', [ApiController::class, 'updateNews']);
    Route::post('/news', [ApiController::class, 'createNews']);
    Route::get('/news/{id}', [ApiController::class, 'getNewsDetails']);
    Route::get('/news', [ApiController::class, 'getList']);
});