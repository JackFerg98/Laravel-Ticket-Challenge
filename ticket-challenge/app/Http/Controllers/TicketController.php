<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Models\User;
use App\Http\Resources\TicketResource;

class TicketController extends Controller
{
    public function index() 
    {
       $tickets = Ticket::paginate(10);
        
       return TicketResource::collection($tickets);
    }

    public function open() 
    {
       $openTickets = Ticket::where('status', false)->paginate(10);
        
       return TicketResource::collection($openTickets);
    }

    public function closed() 
    {
        $closedTickets = Ticket::where('status', true)->paginate(10);
        
        return TicketResource::collection($closedTickets);
    }

    public function getTicketStats() 
    {
        $totalTickets = Ticket::count();
    
        $unprocessedTickets = Ticket::where('status', false)->count();
    
        $topUser = User::select('name', 'email', DB::raw('COUNT(tickets.id) as ticket_count'))
            ->leftJoin('tickets', 'users.id', '=', 'tickets.user_id')
            ->groupBy('users.name', 'users.email')
            ->orderByDesc('ticket_count')
            ->first();
    
        $lastProcessingTime = Ticket::where('status', true)->latest()->value('updated_at');
    
        return response()->json([
            'total_tickets' => $totalTickets,
            'unprocessed_tickets' => $unprocessedTickets,
            'top_user' => $topUser ? ['name' => $topUser->name, 'amount' => $topUser->ticket_count] : null,
            'last_processing_time' => $lastProcessingTime,
        ]);
    }
    
}
