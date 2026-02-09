<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Categorycontroller;
use App\Http\Controllers\Directorcontroller;
use App\Http\Controllers\MovieController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
return phpinfo();
});

Route::resource('directors', Directorcontroller::class);
Route::resource('movies', MovieController::class);
