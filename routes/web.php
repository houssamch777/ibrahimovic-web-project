<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BranchController;
use App\Http\Controllers\admin\PledgeController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\PresidentController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(\App\Http\Middleware\LogVisitor::class );
Route::get('about-us', [HomeController::class, 'aboutCharity'])->name('about');
Route::get('president', [HomeController::class, 'president'])->name('president');
Route::get('donation', [DonationController::class, 'index'])->name('donation.index');





Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('vision', [HomeController::class, 'vision'])->name('vision');
Route::get('branches', [HomeController::class, 'branches'])->name('branches');
Route::get('posts', [HomeController::class, 'posts'])->name('posts');
Route::get('posts/{id}', [HomeController::class, 'postsDetails'])->name('posts.show');
Route::get('familypledge', [HomeController::class, 'familypledge'])->name('familypledge');

Route::get('test', [TestController::class, 'index'])->name('test');
Route::get('search/post',[SearchController::class,'post'])->name('posts.search');
Route::get('our-projects', [HomeController::class, 'projects'])->name('projects');
Route::get('our-projects/{id}', [HomeController::class, 'projectDetails'])->name('projects.show');


Route::get('/family-pledge', [PledgeController::class, 'index'])->name('family.pledge');

Route::get('admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');
Route::get('settings', [SettingsController::class, 'index'])->name('settings')->middleware('auth');
Route::post('admin/gallery', [SettingsController::class, 'galleryStore'])->name('gallery')->middleware('auth');
Route::post('admin/featured-project', [SettingsController::class, 'updateProject'])->name('featured-project.update');
Route::delete('admin/gallery/{id}', [SettingsController::class, 'galleryDestroy'])->name('gallery.destroy')->middleware('auth');



Route::get('admin/project', [ProjectController::class, 'index'])->name('admin.projects.index')->middleware('auth');
Route::get('admin/project/create', [ProjectController::class, 'create'])->name('admin.projects.create')->middleware('auth');
Route::post('admin/project', [ProjectController::class, 'store'])->name('admin.projects.store')->middleware('auth');
Route::get('admin/project/{project}', [ProjectController::class, 'show'])->name('admin.projects.show')->middleware('auth');
Route::get('admin/project/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit')->middleware('auth');
Route::put('admin/project/{project}', [ProjectController::class, 'update'])->name('admin.projects.update')->middleware('auth');
Route::delete('admin/project/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy')->middleware('auth');
Route::post('admin/profile', [AdminController::class, 'updateProfile'])->name('profile.update');

Route::get('admin/president', [PresidentController::class, 'edit'])->name('admin.president.edit');
Route::post('admin/president', [PresidentController::class, 'update'])->name('admin.president.update');

Route::get('admin/branch', [BranchController::class, 'index'])->name('admin.branch.index')->middleware('auth');
Route::get('admin/branch/create', [BranchController::class, 'create'])->name('admin.branch.create');

Route::get('admin/post', [PostController::class, 'index'])->name('admin.posts.index')->middleware('auth');
Route::get('admin/post/create-video', [PostController::class, 'createVideo'])->name('admin.posts.create-video')->middleware('auth');
Route::get('admin/post/create-image', [PostController::class, 'createImage'])->name('admin.posts.create-image')->middleware('auth');
Route::post('admin/post', [PostController::class, 'store'])->name('admin.posts.store')->middleware('auth');
Route::get('admin/post/{post}', [PostController::class, 'show'])->name('admin.posts.show')->middleware('auth');
Route::get('admin/post/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit')->middleware('auth');
Route::put('admin/post/{post}', [PostController::class, 'update'])->name('admin.posts.update')->middleware('auth');
Route::delete('admin/post/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy')->middleware('auth');

Route::post('admin/contact', [SettingsController::class, 'updateContact'])->name('contact.update');


Auth::routes();



// Artisan Command Route (for development or maintenance)
Route::get('foo', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('storage:link');
    return redirect()->route('home')->with('success', 'Welcome to the platform!');
});
