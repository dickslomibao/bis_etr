<?php

use App\Http\Controllers\admin\CerificateController;
use App\Http\Controllers\admin\NewsfeedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\users\HomeController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BarangayPositionController;
use App\Http\Controllers\BlotterController;
use App\Http\Controllers\NewscommentController;
use App\Http\Controllers\OfficialsController;
use App\Http\Controllers\Users\MyRequestController;
use App\Models\Newscomment;
use App\Models\Post;
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
Route::get('/newsview/{slug}', function ($slug) {
    $news = Post::where('slug', $slug)->first();
    if ($news) {
        return view('newsview', [
            'news' => $news,
            'comments'=>Newscomment::where('news_id',"=",$news->id)->with('relation')->get(),
        ]);
    }
    return redirect(404);
});
Route::get('/admin', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/ss', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('users.home');
    Route::POST('/users/getPost', 'getPost')->name('users.getpost');
    Route::POST('/users/getPostImages', 'getPostImages')->name('users.getPostImages');
});
Route::post('/convertdate', [NotificationController::class, 'timeForHumans'])->name('convert.date');


Route::middleware('auth')->group(function () {

    Route::post('/users/make_request', [HomeController::class, 'index'])->name('users.make.request');
    Route::controller(MyRequestController::class)->group(function () {
        Route::get('/users/myrequest/{request_id?}/{notification_id?}', 'index')->name('myrequest');
    });

    Route::controller(AssetsController::class)->group(function () {
        Route::get('/admin/assets/', 'index')->name('assets');
        Route::post('/admin/assets/store', 'store')->name('assets.store');
    });
    Route::controller(NewscommentController::class)->group(function () {
        Route::POST('/comments/store', 'store')->name('newscomment.store');

        //newsviews ajac post
        Route::POST('/comments/news_comment', 'getNewsComment')->name('newscomment.comment');
    });

    Route::controller(OfficialsController::class)->group(function () {
        Route::get('/admin/officials/', 'index')->name('officials.index');
        Route::get('/admin/officials/create', 'create')->name('officials.create');
        Route::POST('/admin/officials/store', 'store')->name('officials.store');
        Route::get('/admin/officials/{id}/edit', 'show')->name('officials.edit');
        Route::POST('/admin/officials/update/{official}', 'update')->name('officials.update');
    });

    Route::controller(BlotterController::class)->group(function () {
        Route::get('/admin/blotter/', 'index')->name('blotter.index');
        Route::get('/admin/blotter/create', 'create')->name('blotter.create');
        Route::POST('/admin/blotter/store', 'store')->name('blotter.store');
        Route::get('/admin/blotter/{id}/edit', 'edit')->name('blotter.edit');
        Route::POST('/admin/blotter/update/{blotter}', 'update')->name('blotter.update');
    });

    Route::controller(CerificateController::class)->group(function () {
        Route::get('/admin/certificate/', 'index')->name('certificate.index');
        Route::get('/admin/certificate/create', 'create')->name('certificate.create');
        Route::POST('/admin/certificate/store', 'store')->name('certificate.store');
        Route::GET('/admin/certificate/print', 'print')->name('certificate.print');

        Route::get('/admin/certificate/{id}/edit', 'edit')->name('certificate.edit');
        Route::POST('/admin/certificate/update/{certificate}', 'update')->name('certificate.update');
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

    Route::get('admin/barangay_positions', [BarangayPositionController::class, 'index'])
        ->name('barangay_positions.index');

    Route::get('admin/barangay_positions/create', [BarangayPositionController::class, 'create'])
        ->name('barangay_positions.create');

    Route::post('admin/barangay_positions', [BarangayPositionController::class, 'store'])
        ->name('barangay_positions.store');

    Route::get('admin/barangay_positions/{barangayPosition}/edit', [BarangayPositionController::class, 'edit'])
        ->name('barangay_positions.edit');

    Route::put('admin/barangay_positions/{barangayPosition}', [BarangayPositionController::class, 'update'])
        ->name('barangay_positions.update');

    Route::delete('admin/barangay_positions/{barangayPosition}', [BarangayPositionController::class, 'destroy'])
        ->name('barangay_positions.destroy');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::controller(NotificationController::class)->group(function () {
        Route::get('/admin/notifaction/{user_id}/{request_id}/{status}', 'createNotification')->name('admin.createNotifaction');
        Route::post('/getnotifications', 'getUserNotifations')->name('get.notifications');
    });
});

require __DIR__ . '/auth.php';
