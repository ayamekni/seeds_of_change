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

// Route for displaying the event management form
Route::get('/createEvent', [EventController::class, 'showForm'])->name('events.form');

// Route for displaying events
Route::get('/events', [EventController::class, 'showEvents'])->name('events.index');


Route::post('/events/store', [EventController::class, 'store'])->name('events.store');

Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');