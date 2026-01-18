<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaundryOrderController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Models\LaundryOrder;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (LOGIN)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| ROOT → LANGSUNG KE LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| TRACKING PUBLIC (UNTUK QR - TANPA LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/tracking/{code}', function ($code) {

    $order = LaundryOrder::with('customer')
        ->where('tracking_code', $code)
        ->firstOrFail();

    return view('tracking.public', compact('order'));

})->name('tracking.public');

/*
|--------------------------------------------------------------------------
| DASHBOARD (ADMIN ONLY)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | ORDERS
    |--------------------------------------------------------------------------
    */
    Route::get('/orders', [LaundryOrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/orders/create', [LaundryOrderController::class, 'create'])
        ->name('orders.create');

    Route::post('/orders', [LaundryOrderController::class, 'store'])
        ->name('orders.store');

    Route::delete('/orders/{order}', [LaundryOrderController::class, 'destroy'])
        ->name('orders.destroy');

    /*
    |--------------------------------------------------------------------------
    | TRACKING (ADMIN)
    |--------------------------------------------------------------------------
    */
    Route::get('/orders/{order}/tracking',
        [LaundryOrderController::class, 'tracking']
    )->name('orders.tracking');

    Route::post('/orders/{order}/tracking',
        [LaundryOrderController::class, 'updateStatus']
    )->name('orders.tracking.update');

    /*
    |--------------------------------------------------------------------------
    | PRINT STRUK
    |--------------------------------------------------------------------------
    */
    Route::get('/orders/{order}/print',
        [LaundryOrderController::class, 'print']
    )->name('orders.print');

    /*
    |--------------------------------------------------------------------------
    | NOTIFICATIONS
    |--------------------------------------------------------------------------
    */
    Route::get('/notifications',
        [NotificationController::class, 'index']
    )->name('notifications.index');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});
