<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// ======================================================
// ROOT
// ======================================================

Route::get('/', function ()
{
    return redirect('/login');
});

// ======================================================
// TEST EMAIL
// ======================================================

Route::get('/test-email', function ()
{
    Mail::raw(
        'Smart Box Email Test',
        function ($message)
        {
            $message
                ->to('rukhsahnst.rusman02@gmail.com')
                ->subject('Test Email');
        }
    );

    return 'EMAIL SENT SUCCESSFULLY';
});

// ======================================================
// AUTHENTICATED ROUTES
// ======================================================

Route::middleware('auth')->group(function ()
{
    // ==================================================
    // DASHBOARD
    // ==================================================

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');

    // ==================================================
    // DASHBOARD STATUS API
    // ==================================================

    Route::get(
        '/dashboard/status',
        [DashboardController::class, 'status']
    )->name('dashboard.status');

    // ==================================================
    // LATEST DELIVERIES API
    // ==================================================

    Route::get(
        '/latest-deliveries',
        [DashboardController::class, 'latestDeliveries']
    )->name('latest.deliveries');

    // ==================================================
    // DELIVERY PAGE
    // ==================================================

    Route::get(
        '/delivery',
        [DeliveryController::class, 'index']
    )->name('delivery.index');

    // ==================================================
    // SAVE DELIVERY
    // ==================================================

    Route::post(
        '/delivery',
        [DeliveryController::class, 'store']
    )->name('delivery.store');

    // ==================================================
    // SETTINGS PAGE
    // ==================================================

    Route::get(
        '/settings',
        [SettingsController::class, 'index']
    )->name('settings.index');

    // ==================================================
    // UPDATE SETTINGS
    // ==================================================

    Route::post(
        '/settings',
        [SettingsController::class, 'update']
    )->name('settings.update');

    // ==================================================
    // ACCOUNT PAGE
    // ==================================================

    Route::get(
        '/account',
        [AccountController::class, 'index']
    )->name('account.index');

    // ==================================================
    // UPDATE ACCOUNT
    // ==================================================

    Route::post(
        '/account/update',
        [AccountController::class, 'update']
    )->name('account.update');
});

// ======================================================
// AUTH ROUTES
// ======================================================

require __DIR__.'/auth.php';