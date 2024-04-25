<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/request_form', function () {
    return view('Request_form.request_form');
})->middleware(['auth', 'verified'])->name('Request_form.request_form');




// area_master_form.request_form

Route::post('/request_form_create', [RequestFormController::class, 'store'])->name('request_form_create');
Route::get('/request_form_view', [RequestFormController::class, 'fetchData'])->middleware(['auth', 'verified'])->name('Request_form.request_form_view');

Route::get('/requests_form_details/{id}', [RequestFormController::class, 'viewData'])->middleware(['auth', 'verified'])->name('requests_form_details.Viewdetails');

Route::put('/requests_form_details_update/{id}',  [RequestFormController::class, 'updatedetails'])->middleware(['auth', 'verified'])->name('requests_form_details_update.updateDetails');


Route::put('/requests_form_details_delete/{id}', [RequestFormController::class, 'deletedetails'])->middleware(['auth', 'verified'])->name('requests_form_details_delete.deleteDetails');;


//area master 

// for sidebar route
Route::get('/area_master_form', function () {
    return view('Property.Area.area_form');
})->middleware(['auth', 'verified'])->name('area_master_form.request_form');

// for view table
Route::get('/request_form_view', [RequestFormController::class, 'fetchData'])->middleware(['auth', 'verified'])->name('Request_form.request_form_view');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
