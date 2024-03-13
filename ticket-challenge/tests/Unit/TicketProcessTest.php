<?php

namespace Tests\Unit;

use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketProcessTest extends TestCase
{
    use RefreshDatabase;

    public function testTicketProcess(): void
    {
        $this->seed();

        $this->artisan('ticket:generate')->assertExitCode(0);

        $this->artisan('ticket:process')->assertExitCode(0);

        $this->assertTrue(Ticket::where('status', true)->exists());
    }
}
