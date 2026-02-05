<?php

use App\Http\Controllers\Dashboard\CaseController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DonationController;
use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\StatisticController;
use App\Http\Controllers\Dashboard\TeamController;
use App\Http\Controllers\Dashboard\TestimonialController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::prefix(LaravelLocalization::setLocale())->group(function () {
    // Website Routes

    Route::name('front.')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('index');
        Route::get('/about', [MainController::class, 'about'])->name('about');
        Route::get('/services', [MainController::class, 'services'])->name('services');
        Route::get('/donations', [MainController::class, 'donation'])->name('donation');
        Route::get('/events', [MainController::class, 'events'])->name('events');
        Route::get('/features', [MainController::class, 'features'])->name('features');
        Route::get('/teams', [MainController::class, 'teams'])->name('teams');
        Route::get('/testimonials', [MainController::class, 'testimonials'])->name('testimonials');
        Route::get('/contact', [MainController::class, 'contact'])->name('contact');
        Route::post('/contact', [MainController::class, 'contact_data']);
        Route::get('/donate/{cause}', [PaymentController::class, 'donate']
        )->name('donate');
        Route::post('/donate', [PaymentController::class, 'donate_process']
        )->name('donate.process');
        Route::get('/donation/success', [PaymentController::class, 'donate_success']
        )->name('donate.success');
        Route::get('/donation/cancel', [PaymentController::class, 'donate_cancel']
        )->name('donate.cancel');
    });

    //Dashboard Routes
    Route::middleware(['auth', 'verified', 'admin'])->group(function () {

        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


        Route::prefix('dashboard')->name('dashboard.')->group(function () {
            Route::resource('sliders', SliderController::class);
            Route::resource('categories', CategoryController::class);
            Route::resource('cases', CaseController::class);
            Route::get('case/{cause}/delete/{image}', [CaseController::class,'delete_image'])->name('delete_image');
            Route::resource('events', EventController::class);
            Route::resource('services', ServiceController::class);
            Route::resource('statistics', StatisticController::class);
            Route::resource('teams', TeamController::class);
            Route::resource('testimonials', TestimonialController::class);
            Route::get('messages', [DashboardController::class, 'messages'])->name('messages');
            Route::get('subscriptions', [DashboardController::class, 'subscriptions'])->name('subscriptions');
            Route::get('donors', [DonationController::class, 'donors'])->name('donors');
            Route::get('donations', [DonationController::class, 'donations'])->name(name: 'donations');
            Route::get('settings', [DashboardController::class, 'settings'])->name('settings');
            Route::put('settings', [DashboardController::class, 'settings_update']);
        });
    });

    require __DIR__ . '/auth.php';
});