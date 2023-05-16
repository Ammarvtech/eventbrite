<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;

Route::get('/', function () {
    return view('welcome');
});


 Route::get('/', [HomeController::class, 'index'])->name('home');

require __DIR__.'/admin.php';


