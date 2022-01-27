<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register',  [\App\Http\Controllers\RegisterBorrower::class, 'register'])->name('register.borrower');

Route::prefix('/data')->group(function () {
  Route::any('applicant',   [\App\Http\Controllers\panel\DataController::class, 'applicant'])->name('borrower.api');
  Route::any('borrower',    [\App\Http\Controllers\panel\DataController::class, 'borrower'])->name('applicant.api');
  Route::any('collection',  [\App\Http\Controllers\panel\CollectionControllerAdmin::class, 'collection'])->name('collection.api');
});

// Action Reject and Apply
Route::prefix('applicant')->group(function() {
  Route::any('/reject',   [\App\Http\Controllers\panel\ApplicantControllerAdmin::class, 'reject'])->name('applicant.reject');
  Route::any('/apply',    [\App\Http\Controllers\panel\ApplicantControllerAdmin::class, 'apply'])->name('applicant.apply');
});

// Blacklist, disburse, payseq, finish
Route::prefix('borrower')->group(function() {
  Route::post('/blacklist',   [\App\Http\Controllers\panel\BorrowerControllerAdmin::class, 'blacklist'])->name('applicant.blacklist');
  Route::any('/disburse',    [\App\Http\Controllers\panel\BorrowerControllerAdmin::class, 'disburse'])->name('applicant.disburse');
  Route::any('/finish',    [\App\Http\Controllers\panel\BorrowerControllerAdmin::class, 'finish'])->name('applicant.finish');
  Route::any('/paySeq',    [\App\Http\Controllers\panel\BorrowerControllerAdmin::class, 'paySeq'])->name('applicant.paySeq');
});

// Emandate
Route::prefix('emandate')->group(function() {
  Route::any('/bank', [\App\Http\Controllers\EmandateHomeController::class, 'getBank'])->name('emandate.bank');
});

// Download
Route::get('/download', function(Request $request) {
  return response()->download(public_path($request->file));
})->name('download');
