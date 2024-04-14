<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


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

Route::get('/dashbord', function () {
    return view('dashbord');
});

Route::get('/profile', function () {
    return view('profile');
});





use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;

// Routes for events
Route::get('/createEvent', [EventController::class, 'showForm'])->name('events.form');
Route::get('/events/manage', [EventController::class, 'manage'])->name('events.manage');
Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/events/browse', [EventController::class, 'browse'])->name('events.browse');

// Routes for registrations
Route::post('/registration/{event}/{user}', [RegistrationController::class, 'create'])->name('registration.create');
Route::delete('/registration/{event}/{user}', [RegistrationController::class, 'delete'])->name('registration.delete');

