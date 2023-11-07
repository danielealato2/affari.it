<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\SearchAnnouncement;
use App\Models\Announcement;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [BasicController::class, 'homepage'])->name('homepage');


Route::resource('announcement', AnnouncementController::class);


Route::get('/category/{category}', [BasicController::class, 'categoryShow'])->name('categoryShow');


Route::get('/detail/announcement/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcement.show');


//Start-Rotte-Annunci.
Route::resource('/announcement', AnnouncementController::class);
Route::get('/announcement/{id}', 'AnnouncementController@showAnnouncement');
//End-Rotte-Annunci.


// Home revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');


// Accetta annuncio
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');


// Rifiuta annuncio
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');


// Richiedi di essere revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

// Rendi utente revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');


//ROTTA PER RICERCARE L'ANNUNCIO.
Route::get('/ricerca/annuncio', [SearchAnnouncement::class, 'searchAnnouncements'])->name('announcement.search');


Route::post('/lingua/{lang}', [BasicController::class, 'setLanguage'])->name('set_language_locale');


//filtra 
Route::get('/category/{category}/filtro', [BasicController::class, 'filtraProdotti'])->name('category.filter');
