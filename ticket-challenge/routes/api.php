<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'tickets'], function () {
    Route::get('/', [TicketController::class, 'index'])->name('ticket.index'); #Shows all tickets
    Route::get('/open', [TicketController::class, 'open'])->name('ticket.open'); #Filters by open
    Route::get('/closed', [TicketController::class, 'closed'])->name('ticket.closed'); #Filters by closed
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index'); #Shows all users (mainly to get an email for the below route)
    Route::get('/{email}/tickets', [UserController::class, 'tickets'])->name('users.tickets'); #Shows tickets by user
});

Route::get('/stats', [TicketController::class, 'getTicketStats']); #Lists ticket stats
