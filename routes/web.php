<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\IopController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['register' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Accounts
    Route::resource('accounts', AccountController::class, ['except' => ['store', 'update', 'destroy']]);

    // Options
    Route::post('options/media', [OptionController::class, 'storeMedia'])->name('options.storeMedia');
    Route::resource('options', OptionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Transactions
    Route::resource('transactions', TransactionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Countries
    Route::resource('countries', CountryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Iops
    Route::resource('iops', IopController::class, ['except' => ['store', 'update', 'destroy']]);

    // Subscription
    Route::resource('subscriptions', SubscriptionController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
