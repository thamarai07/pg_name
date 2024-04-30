<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestFormController;
use App\Http\Controllers\AreaMasterController;
use App\Http\Controllers\BuildingMasterController;
use App\Http\Controllers\RoomsController;



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


// form post router
Route::post('/request_form_create', [RequestFormController::class, 'store'])->name('request_form_create');

Route::post('/area_master_form_create', [AreaMasterController::class, 'store'])->name('area_master_form_create');

Route::post('/building_master_form_create', [BuildingMasterController::class, 'store'])->name('building_master_form_create');

// form post router

// viewing tables  router
Route::get('/request_form_view', [RequestFormController::class, 'fetchData'])->middleware(['auth', 'verified'])->name('Request_form.request_form_view');

Route::get('/area_master_view', [AreaMasterController::class, 'fetchData'])->middleware(['auth', 'verified'])->name('Property.Area.area_master_view');

Route::get('/building_master_view', [BuildingMasterController::class, 'fetchData'])->middleware(['auth', 'verified'])->name('Property.Building.building_master_view');
// viewing tables  router

// viewing update  router
Route::get('/requests_form_details/{id}', [RequestFormController::class, 'viewData'])->middleware(['auth', 'verified'])->name('requests_form_details.Viewdetails');

Route::get('/area_form_details_show/{id}', [AreaMasterController::class, 'viewData'])->middleware(['auth', 'verified'])->name('area_master_details.Viewdetails');
Route::get('/building_form_details_show/{id}', [BuildingMasterController::class, 'viewData'])->middleware(['auth', 'verified'])->name('building_master_details.Viewdetails');
// viewing update  router

// update form router
Route::put('/requests_form_details_update/{id}',  [RequestFormController::class, 'updatedetails'])->middleware(['auth', 'verified'])->name('requests_form_details_update.updateDetails');

Route::put('/area_master_form_details_update/{id}',  [AreaMasterController::class, 'updatedetails'])->middleware(['auth', 'verified'])->name('area_master_form_details_update.updateDetails');

Route::put('/building_master_form_details_update/{id}',  [BuildingMasterController::class, 'updatedetails'])->middleware(['auth', 'verified'])->name('building_master_form_details_update.updateDetails');

// delete
Route::put('/requests_form_details_delete/{id}', [RequestFormController::class, 'deletedetails'])->middleware(['auth', 'verified'])->name('requests_form_details_delete.deleteDetails');;

Route::put('/area_master_details_delete/{id}', [AreaMasterController::class, 'deletedetails'])->middleware(['auth', 'verified'])->name('area_master_details_delete.deleteDetails');;

Route::put('/building_master_details_delete/{id}', [BuildingMasterController::class, 'deletedetails'])->middleware(['auth', 'verified'])->name('building_master_details_delete.deleteDetails');;


// for sidebar route
Route::get('/area_master_form', function () {
    return view('Property.Area.area_form');
})->middleware(['auth', 'verified'])->name('area_master_form.request_form');

Route::get(
    '/building_master_form',
    [BuildingMasterController::class, 'showForm']
)->middleware(['auth', 'verified'])->name('building_master_form.request_form');


Route::get(
    '/room_master_form',
    [RoomsController::class, 'showForm']
)->middleware(['auth', 'verified'])->name('room_master_form.request_form');



// for view table
Route::get('/request_form_view', [RequestFormController::class, 'fetchData'])->middleware(['auth', 'verified'])->name('Request_form.request_form_view');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
