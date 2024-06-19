<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\OrderController;
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
Route::get('/ticket/delete/{id}', [TicketController::class, 'delete'])->name('ticket.delete')->middleware('is_operator');
Route::post('/ticket/update', [TicketController::class, 'update'])->name('ticket.update')->middleware('is_operator');
Route::get('/ticket/new', [TicketController::class, 'newTicket'])->name('ticket.new')->middleware('is_operator');
Route::post('/ticket/create', [TicketController::class, 'create'])->name('ticket.create')->middleware('is_operator');
Route::get('/users', [AdminController::class, 'users'])->name('users')->middleware('is_admin');
Route::get('/user/new', [AdminController::class, 'newUser'])->name('user.new')->middleware('is_admin');
Route::post('/user/create', [AdminController::class, 'createUser'])->name('user.create')->middleware('is_admin');
Route::get('/user/show/{id}', [AdminController::class, 'user'])->name('user')->middleware('is_admin');
Route::post('/user/update', [AdminController::class, 'updateUser'])->name('user.update')->middleware('is_admin');
Route::get('/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('user.delete')->middleware('is_admin');
Route::get('/clients', [ClientController::class, 'index'])->name('clients')->middleware('is_operator');
Route::get('/client/show/{id}', [ClientController::class, 'client'])->name('client')->middleware('is_operator');
Route::post('/client/update', [ClientController::class, 'update'])->name('client.update')->middleware('is_operator');
Route::get('/client/new', [ClientController::class, 'newClient'])->name('client.new')->middleware('is_operator');
Route::post('/client/create', [ClientController::class, 'create'])->name('client.create')->middleware('is_operator');
Route::get('/client/delete/{id}', [ClientController::class, 'delete'])->name('client.delete')->middleware('is_operator');
Route::get('/objects', [ObjectController::class, 'index'])->name('objects')->middleware('is_operator');
Route::get('/object/show/{id}', [ObjectController::class, 'object'])->name('object')->middleware('is_operator');
Route::post('/object/update', [ObjectController::class, 'update'])->name('object.update')->middleware('is_operator');
Route::get('/object/new', [ObjectController::class, 'newObject'])->name('object.new')->middleware('is_operator');
Route::post('/object/create', [ObjectController::class, 'create'])->name('object.create')->middleware('is_operator');
Route::get('/object/delete/{id}', [ObjectController::class, 'delete'])->name('object.delete')->middleware('is_operator');
Route::get('/orders', [OrderController::class, 'index'])->name('order')->middleware('is_admin');
Route::post('/order/create', [OrderController::class, 'create'])->name('order.create')->middleware('is_admin');
