<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TicketGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticket:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new ticket every minute.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Ticket::factory(1)->create();
    }
}
