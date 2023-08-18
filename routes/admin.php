<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TournamentController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\TournamentTypeController;
use App\Http\Controllers\Admin\TournamentFormatController;
use App\Http\Controllers\Admin\TournamentLevelController;
use App\Http\Controllers\Admin\TournamentTeamController;
use App\Http\Controllers\Admin\BookingIntrestController;
use App\Http\Controllers\Admin\TournamentEventController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\AffiliationController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\EventTypeController;

// redirect to /admin/login if got /
Route::redirect('/', '/admin/login');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::get('/profile/{id}', [DashboardController::class, 'profile'])->name('profile');
        Route::post('/profile/{id}', [DashboardController::class, 'updateProfile'])->name('updateProfile');
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
        Route::get('delete/{id}', [TournamentController::class, 'destroy'])->name('destroy');
        Route::get('activate/{id}', [TournamentController::class, 'activate'])->name('activate');
        Route::post('activate/{id}', [TournamentController::class, 'featured'])->name('featured');

    });
    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::get('create', [SettingsController::class, 'create'])->name('create');
        Route::post('store', [SettingsController::class, 'store'])->name('store');

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
    Route::group(['prefix' => 'event-categories', 'as' => 'event-categories.'], function () {
        Route::get('index', [EventCategoryController::class, 'index'])->name('index');
        Route::get('create', [EventCategoryController::class, 'create'])->name('create');
        Route::post('store', [EventCategoryController::class, 'store'])->name('store');
        Route::get('edit/{id}', [EventCategoryController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [EventCategoryController::class, 'update'])->name('update');
        Route::get('delete/{id}', [EventCategoryController::class, 'delete'])->name('destroy');
    });

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
        Route::get('/home', [CmsController::class, 'home'])->name('home');
        Route::post('/home', [CmsController::class, 'homeSubmit'])->name('homeSubmit');
        Route::post('/about-us', [CmsController::class, 'aboutSubmit'])->name('aboutSubmit');
    });
    Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
        Route::get('index', [FaqController::class, 'index'])->name('index');
        Route::get('create', [FaqController::class, 'create'])->name('create');
        Route::post('store', [FaqController::class, 'store'])->name('store');
        Route::get('edit/{id}', [FaqController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [FaqController::class, 'update'])->name('update');
        Route::get('delete/{id}', [FaqController::class, 'delete'])->name('destroy');
    });
    Route::group(['prefix' => 'contactus', 'as' => 'contactus.'], function () {
        Route::get('index', [ContactUsController::class, 'index'])->name('index'); 
        Route::get('delete/{id}', [ContactUsController::class, 'delete'])->name('destroy');
    });

    Route::group(['prefix' => 'bookings', 'as' => 'bookings.'], function () {
        Route::get('index', [BookingController::class, 'index'])->name('index');
        Route::get('create', [BookingController::class, 'create'])->name('create');
        Route::post('store', [BookingController::class, 'store'])->name('store');
        Route::get('edit/{id}', [BookingController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [BookingController::class, 'update'])->name('update');
        Route::get('delete/{id}', [BookingController::class, 'delete'])->name('destroy');
    });
     Route::group(['prefix' => 'booking-intrests', 'as' => 'booking-intrests.'], function () {
        Route::get('index', [BookingIntrestController::class, 'index'])->name('index');
        Route::get('create', [BookingIntrestController::class, 'create'])->name('create');
        Route::post('store', [BookingIntrestController::class, 'store'])->name('store');
        Route::get('edit/{id}', [BookingIntrestController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [BookingIntrestController::class, 'update'])->name('update');
        Route::get('delete/{id}', [BookingIntrestController::class, 'delete'])->name('destroy');
    });
    Route::group(['prefix' => 'event-types', 'as' => 'event-types.'], function () {
        Route::get('index', [EventTypeController::class, 'index'])->name('index');
        Route::get('create', [EventTypeController::class, 'create'])->name('create');
        Route::post('store', [EventTypeController::class, 'store'])->name('store');
        Route::get('edit/{id}', [EventTypeController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [EventTypeController::class, 'update'])->name('update');
        Route::get('delete/{id}', [EventTypeController::class, 'delete'])->name('destroy');
    });
    Route::group(['prefix' => 'tournaments-types', 'as' => 'tournaments-types.'], function () {
        Route::get('index', [TournamentTypeController::class, 'index'])->name('index');
        Route::get('create', [TournamentTypeController::class, 'create'])->name('create');
        Route::post('store', [TournamentTypeController::class, 'store'])->name('store');
        Route::get('edit/{id}', [TournamentTypeController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [TournamentTypeController::class, 'update'])->name('update');
        Route::get('delete/{id}', [TournamentTypeController::class, 'delete'])->name('destroy');
    });
    Route::group(['prefix' => 'tournaments-formats', 'as' => 'tournaments-formats.'], function () {
        Route::get('index', [TournamentFormatController::class, 'index'])->name('index');
        Route::get('create', [TournamentFormatController::class, 'create'])->name('create');
        Route::post('store', [TournamentFormatController::class, 'store'])->name('store');
        Route::get('edit/{id}', [TournamentFormatController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [TournamentFormatController::class, 'update'])->name('update');
        Route::get('delete/{id}', [TournamentFormatController::class, 'delete'])->name('destroy');
    });
    Route::group(['prefix' => 'tournaments-levels', 'as' => 'tournaments-levels.'], function () {
        Route::get('index', [TournamentLevelController::class, 'index'])->name('index');
        Route::get('create', [TournamentLevelController::class, 'create'])->name('create');
        Route::post('store', [TournamentLevelController::class, 'store'])->name('store');
        Route::get('edit/{id}', [TournamentLevelController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [TournamentLevelController::class, 'update'])->name('update');
        Route::get('delete/{id}', [TournamentLevelController::class, 'delete'])->name('destroy');
    });
    Route::group(['prefix' => 'tournaments-teams', 'as' => 'tournaments-teams.'], function () {
        Route::get('index', [TournamentTeamController::class, 'index'])->name('index');
        Route::get('create', [TournamentTeamController::class, 'create'])->name('create');
        Route::post('store', [TournamentTeamController::class, 'store'])->name('store');
        Route::get('edit/{id}', [TournamentTeamController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [TournamentTeamController::class, 'update'])->name('update');
        Route::get('delete/{id}', [TournamentTeamController::class, 'delete'])->name('destroy');
    });
    Route::group(['prefix' => 'tournaments-events', 'as' => 'tournaments-events.'], function () {
        Route::get('index', [TournamentEventController::class, 'index'])->name('index');
        Route::get('create', [TournamentEventController::class, 'create'])->name('create');
        Route::post('store', [TournamentEventController::class, 'store'])->name('store');
        Route::get('edit/{id}', [TournamentEventController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [TournamentEventController::class, 'update'])->name('update');
        Route::get('delete/{id}', [TournamentEventController::class, 'delete'])->name('destroy');
    });
    Route::group(['prefix' => 'reviews', 'as' => 'reviews.'], function () {
        Route::get('index', [ReviewController::class, 'index'])->name('index');
        Route::get('create', [ReviewController::class, 'create'])->name('create');
        Route::post('store', [ReviewController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ReviewController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ReviewController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ReviewController::class, 'delete'])->name('destroy');
    });

    Route::group(['prefix' => 'affiliations', 'as' => 'affiliations.'], function () {
        Route::get('index', [AffiliationController::class, 'index'])->name('index');
        Route::get('create', [AffiliationController::class, 'create'])->name('create');
        Route::post('store', [AffiliationController::class, 'store'])->name('store');
        Route::get('edit/{id}', [AffiliationController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [AffiliationController::class, 'update'])->name('update');
        Route::get('delete/{id}', [AffiliationController::class, 'delete'])->name('destroy');
    });    
        Route::get('forget_password', [DashboardController::class, 'forgetPassword'])->name('forgetPassword');
        Route::get('verify_code', [DashboardController::class, 'verifyCode'])->name('verifyCode');
        Route::get('update_password', [DashboardController::class, 'updatePassword'])->name('updatePassword');
   
});

