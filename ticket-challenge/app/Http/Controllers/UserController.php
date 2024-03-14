<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Models\User;
use App\Http\Resources\TicketResource;

class UserController extends Controller
{
    public function index() 
    {
       $users = User::paginate(10);
        
       return response()->json($users);
    }

    public function tickets(string $email) 
    {
        $user = User::where('email', $email)->firstOrFail();

        $userTickets = $user->tickets()->paginate(10);
        
        return TicketResource::collection($userTickets);
    }

}
