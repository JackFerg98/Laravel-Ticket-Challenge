<?php

namespace Tests\Unit;

use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketGenerationTest extends TestCase
{
    use RefreshDatabase;

    public function testTicketGeneration(): void
    {
        $this->seed();
        
        $this->artisan('ticket:generate')->assertExitCode(0);

        $this->assertTrue(Ticket::exists());

        $ticket = Ticket::latest()->first();

        $this->assertNotNull($ticket->subject);
        $this->assertNotNull($ticket->content);
        $this->assertNotNull($ticket->user->name);
        $this->assertNotNull($ticket->user->email);
        $this->assertNotNull($ticket->added_at);
        $this->assertFalse($ticket->status);
    }
}
