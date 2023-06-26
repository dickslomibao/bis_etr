<?php

use App\Http\Controllers\admin\NewsfeedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\users\HomeController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Users\MyRequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/ss', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::controller(HomeController::class)->group(function () {
    Route::get('/','index')->name('users.home');
    Route::POST('/users/getPost', 'getPost')->name('users.getpost');
    Route::POST('/users/getPostImages', 'getPostImages')->name('users.getPostImages');
});

Route::post('/convertdate', [NotificationController::class,'timeForHumans'])->name('convert.date');

Route::middleware('auth')->group(function () {

    Route::post('/users/make_request',[HomeController::class, 'index'])->name('users.make.request');
    Route::controller(MyRequestController::class)->group(function () {
        Route::get('/users/myrequest/{request_id?}/{notification_id?}', 'index')->name('myrequest');
    });

    Route::controller(AssetsController::class)->group(function () {
        Route::get('/admin/assets/', 'index')->name('assets');
        Route::post('/admin/assets/store', 'store')->name('assets.store');
    });

    Route::controller(NewsfeedController::class)->group(function () {
        Route::get('/admin/newsfeed/', 'index')->name('newsfeed');
        Route::post('/admin/newsfeed/create', 'store')->name('newsfeed.create');
    });

    Route::controller(PostController::class)->group(function () {
        Route::get('/admin/post/', 'index')->name('post');
        Route::get('/admin/post/edit/{id}', 'edit')->name('form.edit.post');
        Route::post('/admin/post/update', 'update')->name('update.post');
        Route::get('/admin/post/create', 'create')->name('create_post');
        Route::post('/admin/post/store', 'store')->name('store.post');
    });

    Route::controller(RequestController::class)->group(function () {
        Route::get('/admin/request/{request_id?}/{notification_id?}', 'index')->name('request');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::controller(NotificationController::class)->group(function () {
        Route::get('/admin/notifaction/{user_id}/{request_id}/{status}', 'createNotification')->name('admin.createNotifaction');
        Route::post('/getnotifications', 'getUserNotifations')->name('get.notifications');
    });
});

require __DIR__ . '/auth.php';
