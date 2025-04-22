<?php

use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserPackageController;
use App\Http\Controllers\PackageController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;

Route::get('/test-email', function () {
    $user = \App\Models\User::first(); // ya kisi specific user ka ID laga do
    $user->notify(new \App\Notifications\PackageSubscribed());
    return 'Email sent successfully!';
});

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
Route::get('auth/google', [SocialController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback']);

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware([IsAdmin::class])->group(function () {
    Route::get('/search', [SearchController::class, 'search']);

    Route::get('/packages', [PackageController::class, 'index'])->name('packages.create');
    Route::get('/admin/packages', [PackageController::class, 'index1'])->name('admin.packages.index');
    Route::get('/users', [RegisterController::class, 'index'])->name('users.index');
    Route::delete('/users/{id}', [RegisterController::class, 'destroy'])->name('users.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/package-view', [UserPackageController::class, 'subscriptions']);
    Route::delete('/package-view/{id}', [UserPackageController::class, 'destroy'])->name('user-packages.destroy');
    Route::delete('/packages/{id}', [PackageController::class, 'destroy'])->name('packages.destroy');
    Route::put('/user-packages/{id}/status', [UserPackageController::class, 'updateStatus'])->name('user-packages.updateStatus');
    Route::get('/edit-packages/{id}/edit', [UserPackageController::class, 'edit'])->name('packages.edit_package');
    Route::put('/package-view/{id}', [UserPackageController::class, 'update'])->name('packages.update');
    Route::get('/package_view', [UserPackageController::class, 'edit'])->name('packages.edit');
    Route::get('/admin/packages/create', [PackageController::class, 'createAdminPackage'])->name('admin.packages.create');
     Route::get('/packages/{id}/edit', [PackageController::class, 'editPackage'])->name('packages.edit-package');
     Route::put('/packages/{id}', [PackageController::class, 'updatePackage'])->name('packages.update-package');


   
    Route::post('/admin/packages/store', [PackageController::class, 'storeAdminPackage'])->name('admin.packages.store');
    
    Route::get('/users/create', [UsersController::class, 'create'])->name('user.add-users');
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit-users');
    Route::put('/admin/users/{id}/update', [UsersController::class, 'update'])->name('admin.users.update');

Route::post('/admin/users/store', [UsersController::class, 'store'])->name('admin.users.store');
});

// Public routes for normal users
Route::middleware([IsUser::class])->group(function () {
    Route::get('/my-package', [UserPackageController::class, 'index'])->name('packages.index');
    Route::get('/buy-package', [UserPackageController::class, 'create'])->name('packages.create');
    Route::post('/buy-package', [UserPackageController::class, 'store'])->name('packages.store');
    Route::post('/purchase-package', [PackageController::class, 'store']);
});

Route::get('/', [UserController::class, 'index']);
// Show the form page

Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');
