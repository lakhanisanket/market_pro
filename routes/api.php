<?php

use App\Http\Controllers\Api\V1\Admin\AccountApiController;
use App\Http\Controllers\Api\V1\Admin\IopApiController;
use App\Http\Controllers\Api\V1\Admin\OptionApiController;
use App\Http\Controllers\Api\V1\Admin\SubscriptionApiController;
use App\Http\Controllers\Api\V1\Admin\TransactionApiController;
use App\Http\Controllers\Api\V1\Admin\UserApiController;


Route::post('register', [UserApiController::class, 'register']);

Route::post('login', [UserApiController::class, 'login']);

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {

    // Users
    Route::apiResource('users', UserApiController::class);

    // Accounts
    Route::apiResource('accounts', AccountApiController::class);
    Route::post('accountCreate', [AccountApiController::class, 'accountCreate']);
    Route::post('accountDelete', [AccountApiController::class, 'accountDelete']);

    // Options
    Route::post('options/media', [OptionApiController::class, 'storeMedia'])->name('options.store_media');
    Route::apiResource('options', OptionApiController::class);
    Route::post('optionCreateEdit', [OptionApiController::class, 'optionCreateEdit']);

    // Transactions
    Route::apiResource('transactions', TransactionApiController::class);
    Route::get('transactionGet', [TransactionApiController::class, 'transactionGet']);
    Route::post('transactionCreate', [TransactionApiController::class, 'transactionCreate']);
    Route::put('transactionEdit', [TransactionApiController::class, 'transactionEdit']);
    Route::post('transactionDelete', [TransactionApiController::class, 'transactionDelete']);

    // Iops
    Route::apiResource('iops', IopApiController::class);
    Route::get('iopsGet', [IopApiController::class, 'iopsGet']);

    // Subscription
    Route::apiResource('subscriptions', SubscriptionApiController::class);
    Route::post('subscriptionCreate', [SubscriptionApiController::class, 'subscriptionCreate']);
    Route::put('subscriptionEdit', [SubscriptionApiController::class, 'subscriptionEdit']);
});
