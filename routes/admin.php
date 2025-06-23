<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminManagement\RoleController;
use App\Http\Controllers\Backend\Admin\AdminManagement\AdminController;
use App\Http\Controllers\Backend\Admin\AdminManagement\PermissionController;
use App\Http\Controllers\Backend\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Backend\Admin\UserManagement\UserController;
use App\Http\Controllers\Backend\Admin\ProfileController;
use App\Http\Controllers\Backend\Admin\ApplicationSettingController;
use App\Http\Controllers\Backend\Admin\UserManagement\QueryController;

Route::group(['middleware' => ['auth:admin', 'verified'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    // Profile Management
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'showProfile')->name('profile');
        Route::put('/update-profile/{id}', 'updateProfile')->name('update-profile');
        Route::get('/change-password', 'showPasswordPage')->name('change-password');
        Route::put('/update-password/{id}', 'updatePassword')->name('update-password');
    });
    // Admin Management
    Route::group(['as' => 'am.', 'prefix' => 'admin-management'], function () {
        // Admin Routes
        Route::resource('admin', AdminController::class);
        Route::controller(AdminController::class)->name('admin.')->prefix('admin')->group(function () {
            Route::post('/show/{admin}', 'show')->name('show');
            Route::get('/status/{admin}', 'status')->name('status');
            Route::get('/trash/bin', 'trash')->name('trash');
            Route::get('/restore/{admin}', 'restore')->name('restore');
            Route::delete('/permanent-delete/{admin}', 'permanentDelete')->name('permanent-delete');
        });
        // Role Routes
        Route::resource('role', RoleController::class);
        Route::controller(RoleController::class)->name('role.')->prefix('role')->group(function () {
            Route::post('/show/{role}', 'show')->name('show');
            Route::get('/trash/bin', 'trash')->name('trash');
            Route::get('/restore/{role}', 'restore')->name('restore');
            Route::delete('/permanent-delete/{role}', 'permanentDelete')->name('permanent-delete');
        });
        // Permission Routes
        Route::resource('permission', PermissionController::class);
        Route::controller(PermissionController::class)->name('permission.')->prefix('permission')->group(function () {
            Route::post('/show/{permission}', 'show')->name('show');
            Route::get('/trash/bin', 'trash')->name('trash');
            Route::get('/restore/{permission}', 'restore')->name('restore');
            Route::delete('/permanent-delete/{permission}', 'permanentDelete')->name('permanent-delete');
        });
    });

    Route::group(['as' => 'um.', 'prefix' => 'user-management'], function () {
        Route::resource('user', UserController::class);
        Route::controller(UserController::class)->name('user.')->prefix('user')->group(function () {
            Route::get('/status/{user}', 'status')->name('status');
            Route::get('/trash/bin', 'trash')->name('trash');
            Route::post('/show/{user}', 'show')->name('show');
            Route::get('/restore/{user}', 'restore')->name('restore');
            Route::delete('/permanent-delete/{user}', 'permanentDelete')->name('permanent-delete');
        });
        Route::controller(QueryController::class)->name('query.')->prefix('query')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::POST('/show/{query}', 'show')->name('show');
        });
    });


    // Application Settings 
    Route::controller(ApplicationSettingController::class)->name('app-settings.')->prefix('application-settings')->group(function () {
        Route::post('/update-settings', 'updateSettings')->name('update-settings');
        Route::get('/', 'general')->name('general');
        Route::get('/database', 'database')->name('database');
        Route::get('/smtp', 'smtp')->name('smtp');
    });
});
