<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Models\User;

class TicketController extends Controller
{
    public function index() 
    {
       $tickets = Ticket::paginate(10);
        
       return response()->json($tickets);
    }

    public function open() 
    {
       $openTickets = Ticket::where('status', false)->paginate(10);
        
       return response()->json($openTickets);
    }

    public function closed() 
    {
        $closedTickets = Ticket::where('status', true)->paginate(10);
        
        return response()->json($closedTickets);
    }

    public function getUserTickets(string $email) 
    {
        $userTickets = Ticket::where('email', $email)->paginate(10);
        
        return response()->json($userTickets);
    }

    public function getTicketStats() 
    {
        {
            $totalTickets = Ticket::count();
    
            $unprocessedTickets = Ticket::where('status', false)->count();
    
            $topUser = DB::table('tickets')
                ->select('user_name', 'user_email', DB::raw('COUNT(*) as ticket_count'))
                ->groupBy('user_name', 'user_email')
                ->orderByDesc('ticket_count')
                ->first();
    
            $lastProcessingTime = Ticket::where('status', true)->latest()->value('updated_at');
    
            return response()->json([
                'total_tickets' => $totalTickets,
                'unprocessed_tickets' => $unprocessedTickets,
                'top_user' => ['name: '.$topUser->user_name, 'amount: '.$topUser->ticket_count] ?? null,
                'last_processing_time' => $lastProcessingTime ?? null,
            ]);
        }
    }
}
