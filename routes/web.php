<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get ('/admin', [AdminController:: class , 'admin'])->name('admin')->middleware('is_admin');
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets');
Route::get('/ticket/show/{id}', [TicketController::class, 'ticket'])->name('ticket');
Route::get('/ticket/delete/{id}', [TicketController::class, 'delete'])->name('ticket.delete')->middleware('is_admin');
Route::post('/ticket/update', [TicketController::class, 'update'])->name('ticket.update')->middleware('is_operator');
Route::get('/ticket/new', [TicketController::class, 'newTicket'])->name('ticket.new');
Route::post('/ticket/create', [TicketController::class, 'create'])->name('ticket.create')->middleware('is_operator');
Route::get('/users', [AdminController::class, 'users'])->name('users')->middleware('is_admin');
Route::get('/user/new', [AdminController::class, 'newUser'])->name('user.new');
Route::post('/user/create', [AdminController::class, 'createUser'])->name('user.create')->middleware('is_admin');
Route::get('/user/show/{id}', [AdminController::class, 'user'])->name('user')->middleware('is_admin');
Route::post('/user/update', [AdminController::class, 'updateUser'])->name('user.update')->middleware('is_operator');
