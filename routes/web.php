<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\OrgaController;


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


Route::get('/register', [AuthController::class, 'auth'])->name('login');
Route::get('/login', [AuthController::class, 'auth'])->name('login');
Route::post('/login', [AuthController::class, 'signin'])->name('login');
Route::post('/register', [AuthController::class, 'signup'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/store' , [EventController::class , 'store'])->name('store');

Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/create', [EventController::class, 'create'])->name('create');

Route::get('/event/{id}', [EventController::class, 'singleEvent'])->name('singleEvent');

Route::delete('/event/delete/{id}', [EventController::class, 'destroy'])->name('destroy');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/dash', [OrgaController::class, 'index'])->name('orga');
Route::post('/reserve/{eventId}/{plan}' , [ReservationController::class , 'store'])->name('reserve');


Route::post('/event/approve/{id}' , [AdminController::class , 'approveEvent'])->name('approveEvent');
Route::post('/event/reject/{id}' , [AdminController::class , 'rejectEvent'])->name('rejectEvent');
Route::post('/event/restrict/{id}' , [AdminController::class , 'restrictUser'])->name('restrict');



