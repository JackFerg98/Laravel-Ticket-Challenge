<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Models\User;

class UserController extends Controller
{
    public function index() 
    {
       $users = User::paginate(10);
        
       return response()->json($users);
    }

    public function tickets(string $email) 
    {
        $userTickets = Ticket::where('user_email', $email)->paginate(10);
        
        return response()->json($userTickets);
    }

}
