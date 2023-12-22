<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Api\Web\Admin\AdminController;

Route::post('login', LoginController::class);
Route::post('logout', LogoutController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function() {
    Route::prefix('admins')->name('admin.')->controller(AdminController::class)->group(function () {
        Route::get('{id}', 'show');
        Route::put('{id}', 'update')->name('update');
    });
});
