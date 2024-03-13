<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TicketProcessor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticket:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process a ticket every five minutes.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $ticket = Ticket::where('status', false)->orderBy('added_at')->first();

        if ($ticket) {
            $ticket->status = true;
            $ticket->save();

            $this->info('Ticket processed: ' . $ticket->id);
        } else {
            $this->info('No unprocessed tickets found.');
        }
    }
}
