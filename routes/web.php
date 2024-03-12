<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FiltrerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrganiserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function(){
    Route::get('/organiser/statistics', [OrganiserController::class, 'organiser_dashboard'])->name('organiser.organiser_dashboard');
}); 

Route::middleware(['auth'])->group(function(){
    Route::get('/admin/statistics', [AdminController::class, 'admin_dashboard'])->name('admin.admin_dashboard');
});

Route::post('/search', [SearchController::class, 'search'])->name('search');

Route::put('/user/update/photo', [ProfileController::class, 'updatePhoto'])->name('updatePhoto');

Route::get('/myEvents', [EventController::class, 'myEvents'])->name('organiser.myEvents');
Route::get('/events/display/all', [EventController::class, 'displayEvents'])->name('displayEvents');
Route::get('/createEvent', [EventController::class, 'createEvents'])->name('createEvents');
Route::post('/createEvent/store', [EventController::class, 'store'])->name('createEvents.store');
Route::get('/updateEvent{id}', [EventController::class, 'updateEvents'])->name('updateEvents');
Route::post('/updateEvent/edit{id}', [EventController::class, 'update'])->name('updateEvents.edit');
Route::delete('/deleteEvent{id}', [EventController::class, 'deleteEvent'])->name('eventDelete');
Route::get('/organiser/eventsDetails{id}', [EventController::class, 'eventsDetails'])->name('eventsDetails');

Route::get('/categories', [CategoryController::class, 'categories'])->name('admin.categories');
Route::get('/categories/display/all', [CategoryController::class, 'displayCategories'])->name('displayCategories');
Route::get('/createCategory', [CategoryController::class, 'createCategories'])->name('createCategories');
Route::post('/createCategory/store', [CategoryController::class, 'storeCategories'])->name('createCategories.store');
Route::get('/updateCategory{id}', [CategoryController::class, 'updateCategories'])->name('updateCategories');
Route::post('/updateCategory/edit{id}', [CategoryController::class, 'update'])->name('updateCategories.edit');
Route::delete('/deleteCategory{id}', [CategoryController::class, 'deleteCategory'])->name('categoryDelete');

Route::post('/user/apply{id}', [ReservationController::class, 'apply'])->name('apply');

Route::get('/invoice', [InvoiceController::class, 'generate']);

Route::get('/viewsEvents', [EventController::class, 'validationEvents'])->name('validationEvents');

Route::get('/updateValidated{id}', [EventController::class, 'validatedEvent'])->name('validatedEvent');
Route::get('/updateUnvalidated{id}', [EventController::class, 'unvalidatedEvent'])->name('unvalidatedEvent');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/user/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('/events/filter', [EventController::class, 'filterByCategory'])->name('filterByCategory');

Route::post('/reservations/ticket/{reservation}', [ReservationController::class, 'generateTicket'])->name('events.ticket');
Route::post('/showticket', [ReservationController::class, 'showTicket'])->name('showTicket');
