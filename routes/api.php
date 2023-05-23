<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Components\Services\CountryService;
use App\Http\Controllers\Frontend\TournamentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/verify-code', [UserController::class, 'verifyCode']);
Route::get('/countries', [CountryService::class, 'getAll']);

// about us 
Route::get('/privacy-policy', [PagesController::class, 'privacyPolicy']);

// terms and conditions
Route::get('/terms-and-conditions', [PagesController::class, 'termsAndConditions']);
Route::get('/disclaimer', [PagesController::class, 'disclaimer']);
Route::get('/about-us', [PagesController::class, 'aboutUs']);
Route::get('/contact-us', [PagesController::class, 'contactUs']);
Route::get('/faq', [PagesController::class, 'faq']);

// post the contact us form to this route.
Route::post('/contact-us', [PagesController::class, 'saveContactUs']);

// tournaments
Route::get('/tournament-details', [TournamentController::class, 'getDetails']);
Route::get('/tournaments', [TournamentController::class, 'getAll']);
Route::get('/tournaments/{id}', [TournamentController::class, 'getById']);
Route::post('/tournaments-create', [TournamentController::class, 'create'])->name('tournaments.create');
Route::post('/upload', [TournamentController::class, 'upload']);
Route::put('/tournaments/{id}', [TournamentController::class, 'update']);
Route::delete('/tournaments/{id}', [TournamentController::class, 'delete']);
