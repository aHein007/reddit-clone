<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\CommunityController;
use App\Http\Controllers\Backend\CommunityPostController;
use App\Http\Controllers\Frontend\CommunityController as FrontendCommunityController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//show community
Route::get('/r/{slug}',[FrontendCommunityController::class,'show'])->name('frontend.communities.show');

Route::group(['middleware' => ['auth','verified']],function(){
    Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('/dashboard/communities',CommunityController::class);
     Route::resource('/dashboard/communities.post',CommunityPostController::class);
});



require __DIR__.'/auth.php';
