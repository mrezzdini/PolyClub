<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\homeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// front-end
Route::get('/',[homeController::class, 'index']);
Route::get('/home',[homeController::class, 'index']);
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/a-propos', function () {
    return view('about');
});
Route::get('clubs',[ClubController::class, 'index']);
Route::get('clubs/detail/{club}', [ClubController::class, 'show']);

Route::get('events',[EventController::class, 'index']);
Route::get('events/detail/{event}', [EventController::class, 'show']);
Route::post('events/detail/{event}/store', [EventController::class, 'store']);

// back-end

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/wel', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
