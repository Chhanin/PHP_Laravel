<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Categorycontroller;
use App\Http\Controllers\Directorcontroller;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
return phpinfo();
});

Route::resource('directors', Directorcontroller::class);
