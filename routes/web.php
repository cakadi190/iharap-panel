<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
|
| Here is the route list for homepage and login system. Let's build
| something great from this.
|
*/

Route::redirect('/', 'login', 302);
Auth::routes(['register' => false]);

Route::get('/loan-check', [\App\Http\Controllers\HomeController::class, 'loan'])->name('loan-check');

Route::get('/emandate/{hash}',              [\App\Http\Controllers\EmandateHomeController::class, 'main'])->name('emandate');
Route::post('/emandate/process',            [\App\Http\Controllers\EmandateHomeController::class, 'process'])->name('emandate.process');
Route::post('/emandate/callback/success',   [\App\Http\Controllers\EmandateHomeController::class, 'success'])->name('emandate.success');
Route::post('/emandate/callback/failure',   [\App\Http\Controllers\EmandateHomeController::class, 'failure'])->name('emandate.failure');
Route::post('/emandate/callback/callback',  [\App\Http\Controllers\EmandateHomeController::class, 'callback'])->name('emandate.callback');

/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
|
| Here is the route list for administrator system. Let's build something
| great from this.
|
*/
Route::prefix('dashboard')->middleware('auth')->group(function() {

  // For Homepage
  Route::get('/home',             [\App\Http\Controllers\admin\MainController::class, 'home'])->name('home');

  Route::get('/profile',          [\App\Http\Controllers\admin\MainController::class, 'profile'])->name('profile');
  Route::post('/profile',         [\App\Http\Controllers\admin\MainController::class, 'update'])->name('update');

  Route::resource('applicant',    \App\Http\Controllers\panel\ApplicantControllerAdmin::class);
  Route::resource('borrower',     \App\Http\Controllers\panel\BorrowerControllerAdmin::class);
  Route::resource('collection',   \App\Http\Controllers\panel\CollectionControllerAdmin::class);
  Route::resource('overdue',      \App\Http\Controllers\panel\OverdueControllerAdmin::class);
  Route::resource('user-roles',   \App\Http\Controllers\panel\RoleControllerAdmin::class);
  Route::resource('sales',        \App\Http\Controllers\panel\SalesControllerAdmin::class);
  Route::resource('late-changes', \App\Http\Controllers\panel\LateControllerAdmin::class);

});
