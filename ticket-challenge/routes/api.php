<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

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

Route::get('/users/{email}/tickets', [TicketController::class, 'getUserTickets']); #Shows tickets by user

Route::get('/stats', [TicketController::class, 'getTicketStats']); #Lists ticket stats
