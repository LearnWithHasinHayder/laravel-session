<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
// use App\Http\Middleware\SimpleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// Route::view("/",'welcome');

Route::get('/set-session', [ExampleController::class, 'setSession']);
Route::get('/get-session', [ExampleController::class, 'getSession']);
Route::get('/read-again', [ExampleController::class, 'readAgain']);
Route::get('/about', [ExampleController::class, 'about']);
Route::get('/update-session', [ExampleController::class, 'updateSession']);
Route::get('/delete-session', [ExampleController::class, 'deleteSessionData']);

Route::get('/set-flash-message', [ExampleController::class, 'setFlashMessage']);
Route::get('/get-flash-message', [ExampleController::class, 'getFlashMessage']);
Route::get('/flash', [ExampleController::class, 'flash']);
Route::get('/flash-redirect', [ExampleController::class, 'setFlashAndRedirect']);

Route::view('/form', 'form');
Route::post('/form', [ExampleController::class, 'formSubmit']);

Route::get('/set-log', [ExampleController::class, 'createLog']);

// Route::get('/api/countries', [ExampleController::class, 'sampleCountryApi'])->middleware('throttle:5,1');
Route::middleware('throttle:5,1')->group(function () {
    Route::get('/api/countries', [ExampleController::class, 'sampleCountryApi']);
});

// Route::get('/api/countries/{country}', [ExampleController::class, 'getCountry'])->middleware([
//     SimpleMiddleware::class,
//     'throttle:5,1'
// ]);
