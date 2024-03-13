<?php

namespace Tests\Unit;

use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    public function testTicketCanBeCreated(): void
    {
        $ticket = Ticket::factory()->create([
            'subject' => 'Test Subject',
            'content' => 'Test Content',
            'user_name' => 'Jack Ferguson',
            'user_email' => 'jackferguson@fakeemail.com',
            'added_at' => now(),
            'status' => false,
        ]);

        $ticket = $this->assertDatabaseHas( 'tickets', [
            'subject' => 'Test Subject',
            'content' => 'Test Content',
            'user_name' => 'Jack Ferguson',
            'user_email' => 'jackferguson@fakeemail.com',
            'status' => false,
        ]);
    }
}
