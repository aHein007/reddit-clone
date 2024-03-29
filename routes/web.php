<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\PostVoteController;
use App\Http\Controllers\Backend\CommunityController;
use App\Http\Controllers\Frontend\PostDetailController;
use App\Http\Controllers\Frontend\PostCommentController;
use App\Http\Controllers\Backend\CommunityPostController;
use App\Http\Controllers\Frontend\CommunityController as FrontendCommunityController;
use App\Http\Controllers\Frontend\WelcomePageController;

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


Route::get('/',[WelcomePageController::class,'welcome'])->name('welcome');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//show community
Route::get('/r/{slug}',[FrontendCommunityController::class,'show'])->name('frontend.communities.show'); // this is post show
Route::get('/r/{community_slug}/post/{post:slug}',[PostDetailController::class,'show'])->name('frontend.post.show'); // this is detail
Route::post('/r/{community_slug}/post/{post:slug}/comment',[PostCommentController::class,'store'])->name('frontend.post.store'); // comment store

Route::group(['middleware' => ['auth','verified']],function(){
  Route::resource('communities',CommunityController::class);
     Route::resource('communities.post',CommunityPostController::class);

    Route::post('posts/{post:slug}/upVote',[PostVoteController::class,'upVote'])->name('posts.upVote');
    Route::post('posts/{post:slug}/downVote',[PostVoteController::class,'downVote'])->name('posts.downVote');

});



require __DIR__.'/auth.php';
