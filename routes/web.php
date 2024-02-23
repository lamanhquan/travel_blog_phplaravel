<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('ping', function () {
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
	'apiKey' => config('services.mailchimp.key'),
	'server' => 'us12'
]);

$response = $mailchimp->ping->get();
ddd($response);
});


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('profile', [ProfileController::class,'show'])->middleware('auth');
Route::post('profile/updateAvatar', [ProfileController::class,'updateAvatar'])->middleware('auth');
Route::post('profile/update', [ProfileController::class,'update'])->middleware('auth');

Route::get('posts/{post:slug}/like', [LikeController::class,'liker'])->middleware('auth');

Route::get('posts/{post:slug}', [PostController::class,'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::get('login/google',[LoginController::class, 'redirectToGoogle'])->middleware('guest');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');