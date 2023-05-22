<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TournamentController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('index', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('destroy');
    });
    Route::group(['prefix' => 'organization', 'as' => 'organization.'], function () {
        Route::get('/', [OrganizationController::class, 'index'])->name('index');
        Route::get('create', [OrganizationController::class, 'create'])->name('create');
        Route::post('store', [OrganizationController::class, 'store'])->name('store');
        Route::get('edit/{id}', [OrganizationController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [OrganizationController::class, 'update'])->name('update');
        Route::get('delete/{id}', [OrganizationController::class, 'delete'])->name('destroy');
    });
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('index', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('update');
        Route::get('delete/{id}', [UserController::class, 'delete'])->name('destroy');
    });
    Route::group(['prefix' => 'tournaments', 'as' => 'tournaments.'], function () {
        Route::get('index', [TournamentController::class, 'index'])->name('index');
        Route::get('create', [TournamentController::class, 'create'])->name('create');
        Route::get('show/{id}', [TournamentController::class, 'show'])->name('show');
        Route::post('store', [TournamentController::class, 'store'])->name('store'); 
        Route::get('edit/{id}', [TournamentController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [TournamentController::class, 'update'])->name('update');
        Route::get('delete/{id}', [TournamentController::class, 'delete'])->name('destroy');
    });

    // Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    //     Route::get('index', [ProductController::class, 'index'])->name('index');
    //     Route::get('create', [ProductController::class, 'create'])->name('create');
    //     Route::post('store', [ProductController::class, 'store'])->name('store');
    //     Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
    //     Route::post('update/{id}', [ProductController::class, 'update'])->name('update');
    //     Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete');
    // });
    // Route::group(['prefix' => 'banners', 'as' => 'banners.'], function () {
    //     Route::get('index', [BannerController::class, 'index'])->name('index');
    //     Route::get('create', [BannerController::class, 'create'])->name('create');
    //     Route::post('store', [BannerController::class, 'store'])->name('store');
    //     Route::get('edit/{id}', [BannerController::class, 'edit'])->name('edit');
    //     Route::post('update/{id}', [BannerController::class, 'update'])->name('update');
    //     Route::get('delete/{id}', [BannerController::class, 'delete'])->name('delete');
    // });
    // Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
    //     Route::get('index', [EventController::class, 'index'])->name('index');
    //     Route::get('create', [EventController::class, 'create'])->name('create');
    //     Route::post('store', [EventController::class, 'store'])->name('store');
    //     Route::get('edit/{id}', [EventController::class, 'edit'])->name('edit');
    //     Route::post('update/{id}', [EventController::class, 'update'])->name('update');
    //     Route::get('delete/{id}', [EventController::class, 'delete'])->name('delete');
    // });
    // Route::group(['prefix' => 'jobs', 'as' => 'jobs.'], function () {
    //     Route::get('index', [JobController::class, 'index'])->name('index');
    //     Route::get('create', [JobController::class, 'create'])->name('create');
    //     Route::post('store', [JobController::class, 'store'])->name('store');
    //     Route::get('edit/{id}', [JobController::class, 'edit'])->name('edit');
    //     Route::post('update/{id}', [JobController::class, 'update'])->name('update');
    //     Route::get('delete/{id}', [JobController::class, 'delete'])->name('delete');
    // });
    // Route::group(['prefix' => 'event-categories', 'as' => 'event-categories.'], function () {
    //     Route::get('index', [EventCategoryController::class, 'index'])->name('index');
    //     Route::get('create', [EventCategoryController::class, 'create'])->name('create');
    //     Route::post('store', [EventCategoryController::class, 'store'])->name('store');
    //     Route::get('edit/{id}', [EventCategoryController::class, 'edit'])->name('edit');
    //     Route::post('update/{id}', [EventCategoryController::class, 'update'])->name('update');
    //     Route::get('delete/{id}', [EventCategoryController::class, 'delete'])->name('destroy');
    // });

    Route::group(['prefix' => 'cms-pages', 'as' => 'cms-pages.'], function () {
        Route::get('index', [PageController::class, 'index'])->name('index');
        Route::get('create', [PageController::class, 'create'])->name('create');
        Route::post('store', [PageController::class, 'store'])->name('store');
        Route::get('edit/{id}', [PageController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [PageController::class, 'update'])->name('update');
        Route::get('delete/{id}', [PageController::class, 'delete'])->name('destroy');
    });
    Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
        Route::get('/contact-us', [CmsController::class, 'contact'])->name('contact');
        Route::post('/contact-us/{id}', [CmsController::class, 'contactSubmit'])->name('contactSubmit');
        Route::get('/about-us', [CmsController::class, 'about'])->name('about');
        Route::post('/about-us', [CmsController::class, 'aboutSubmit'])->name('aboutSubmit');
    });

});

