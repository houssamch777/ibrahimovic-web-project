<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\PledgeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BranchController;
use App\Http\Controllers\admin\PledgeController as AdminPledgeController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\PresidentController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\SettingsController;

// ==========================
// Public Routes
// ==========================
use App\Http\Controllers\admin\PaymentController;

Route::post('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment/failure', [PaymentController::class, 'paymentFailure'])->name('payment.failure');
// Home & General Pages
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(\App\Http\Middleware\LogVisitor::class);
Route::get('about-us', [HomeController::class, 'aboutCharity'])->name('about');
Route::get('president', [HomeController::class, 'president'])->name('president');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('vision', [HomeController::class, 'vision'])->name('vision');
Route::get('branches', [HomeController::class, 'branches'])->name('branches');

// Donation & Volunteer
Route::get('donation', [DonationController::class, 'index'])->name('donation.index');
Route::get('volunteer', [HomeController::class, 'volunteer'])->name('volunteer');

// Posts
Route::get('posts', [HomeController::class, 'posts'])->name('posts');
Route::get('posts/{id}', [HomeController::class, 'postsDetails'])->name('posts.show');

// Projects
Route::get('our-projects', [HomeController::class, 'projects'])->name('projects');
Route::get('our-projects/{id}', [HomeController::class, 'projectDetails'])->name('projects.show');

// Family Pledge
Route::get('familypledge', [HomeController::class, 'familypledge'])->name('familypledge');

// Search
Route::get('search/post', [SearchController::class, 'post'])->name('posts.search');

// Test Route (Development Only)
Route::get('test', [TestController::class, 'index'])->name('test');

// ==========================
// Admin Routes
// ==========================
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Settings
    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('settings/gallery', [SettingsController::class, 'galleryStore'])->name('gallery');
    Route::post('settings/featured-project', [SettingsController::class, 'updateProject'])->name('featured-project.update');
    Route::delete('settings/gallery/{id}', [SettingsController::class, 'galleryDestroy'])->name('gallery.destroy');
    Route::post('settings/contact', [SettingsController::class, 'updateContact'])->name('contact.update');

    // Projects
    Route::resource('project', ProjectController::class)->names('projects');

    // Posts
    Route::get('post/create-video', [PostController::class, 'createVideo'])->name('posts.create-video');
    Route::get('post/create-image', [PostController::class, 'createImage'])->name('posts.create-image');
    Route::resource('post', PostController::class)->names('posts');

    // President
    Route::get('president', [PresidentController::class, 'edit'])->name('president.edit');
    Route::post('president', [PresidentController::class, 'update'])->name('president.update');

    // Branches
    Route::resource('branch', BranchController::class)->names('branch');

    // Profile
    Route::post('profile', [AdminController::class, 'updateProfile'])->name('profile.update');
});

// ==========================
// Authentication Routes
// ==========================
Auth::routes();

// ==========================
// Development Tools (Artisan Commands)
// ==========================
Route::get('foo', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('storage:link');
    return redirect()->route('home')->with('success', 'All caches cleared!');
});
