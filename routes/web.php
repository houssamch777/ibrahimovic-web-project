<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SettingsController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(\App\Http\Middleware\LogVisitor::class );
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings')->middleware('auth');
Route::post('/admin/gallery', [SettingsController::class, 'galleryStore'])->name('gallery')->middleware('auth');
Route::post('/admin/featured-project', [SettingsController::class, 'updateProject'])->name('featured-project.update');
Route::delete('/admin/gallery/{id}', [SettingsController::class, 'galleryDestroy'])->name('gallery.destroy')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Artisan Command Route (for development or maintenance)
Route::get('/foo', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('storage:link');
    return redirect()->route('index')->with('success', 'Welcome to the platform!');
});
