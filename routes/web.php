<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArchiveController;

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



//##############Admin Route##################

Route::get('/admin', [EventController::class,'adminIndex'])->name('admin')->middleware('is_admin');

//##############Admin Route##################

Route::get('/welcome',[EventController::class,'index'])->name('welcome');
Route::get('/',[EventController::class,'index'])->name('welcome');


Route::get('/addEvent', function () {
    return view('addEvent');
});




Route::post('/addEvent',[EventController::class,'store'])->name('add.event');


Auth::routes();
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/welcome');
})->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/pending', [EventController::class, 'pendingEvents'])->name('pending.events');
Route::get('/events/refused', [EventController::class, 'refusedEvents'])->name('refused.events');
Route::get('/events/accepted', [EventController::class, 'acceptedEvents'])->name('accepted.events');


Route::get('/events/archived', [ArchiveController::class, 'archivedEvents'])->name('accepted.events');






Route::get('/events/accepted/{id}', [EventController::class, 'acceptedEvent'])->name('accept.event');
Route::get('/events/refused/{id}', [EventController::class, 'refusedEvent'])->name('refused.event');
Route::get('/events/archived/{id}', [EventController::class, 'archivedEvent'])->name('archived.events');


Route::get('/events/{id}', [EventController::class, 'oneEvent'])->name('events.by.id');

