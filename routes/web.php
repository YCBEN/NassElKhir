<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/pending', [EventController::class, 'pendingEvents'])->name('pending.events');
Route::get('/events/refused', [EventController::class, 'refusedEvents'])->name('refused.events');
Route::get('/events/accepted', [EventController::class, 'acceptedEvents'])->name('accepted.events');



Route::get('/events/accepted/{id}', [EventController::class, 'acceptedEvent'])->name('accept.event');
Route::get('/events/refused/{id}', [EventController::class, 'refusedEvent'])->name('refused.event');


Route::get('/events/{id}', [EventController::class, 'oneEvent'])->name('events.by.id');

