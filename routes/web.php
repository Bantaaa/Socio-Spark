<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\OrgaController;
use App\Http\Controllers\TicketController;


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


Route::get('/', [EventController::class, 'index'])->name('home');

Route::group(['middleware' => 'Admin'], function () {
    // Your admin routes here
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/user/ban/{id}', [AdminController::class, 'ban'])->name('ban');
    Route::post('/user/unban/{id}', [AdminController::class, 'unban'])->name('unban');
    Route::post('/event/approve/{id}', [AdminController::class, 'approveEvent'])->name('approveEvent');
    Route::post('/event/reject/{id}', [AdminController::class, 'rejectEvent'])->name('rejectEvent');


    Route::put('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('categoryUpdate');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('categoryDelete');

});

Route::group(['middleware' => 'Organizer'], function () {
    // Your organizer routes here
    Route::post('/store', [EventController::class, 'store'])->name('store');

    Route::get('/create', [EventController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [EventController::class, 'edit'])->name('edit');
    Route::post('/event/update/{id}', [EventController::class, 'updateEvent'])->name('updateEvent');
    Route::delete('/event/delete/{id}', [EventController::class, 'destroy'])->name('destroy')->middleware('event.owner');
    Route::get('/dash', [OrgaController::class, 'index'])->name('orga');
    Route::get('/ticket/create/{id}', [TicketController::class, 'createTicket'])->name('createTicket');
    Route::get('/reservation/reject/{id}', [ReservationController::class, 'rejectReservation'])->name('rejectReservation');
});


Route::group(['middleware' => 'User'], function () {
    // Your user routes here
    Route::post('/reserve/{eventId}/{plan}', [ReservationController::class, 'store'])->name('reserve');
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets');

    
});

Route::group(['middleware' => 'banned'], function () {
    // Route::get('/event/{id}', [AuthController::class, 'forbidden'])->name('singleEvent');
    Route::get('/forbidden', [AuthController::class, 'forbidden'])->name('forbidden');
});


Route::get('/event/{id}', [EventController::class, 'singleEvent'])->name('singleEvent');


Route::get('/register', [AuthController::class, 'auth'])->name('login');
Route::get('/login', [AuthController::class, 'auth'])->name('login');
Route::post('/login', [AuthController::class, 'signin'])->name('login');
Route::post('/register', [AuthController::class, 'signup'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/search/events', [EventController:: class, 'searchEvents'])->name('search.events');
Route::get('/search/categories', [EventController:: class, 'searchCategories'])->name('search.category');






// forgot password
Route::get('/forgot-password', [AuthController::class, 'forgetPasswordPage'])->name('forgot.password');
Route::get('/reset-password', [AuthController::class, 'resetPasswordPage'])->name('password.reset');
Route::post('/reset', [AuthController::class, 'sendResetLink'])->name('password.reset.post');
Route::post('/reset-password', [AuthController::class, 'reset'])->name('reset');
