<?php

namespace Tests\Unit;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    public function testTicketCanBeCreated(): void
    {
        $user = User::factory()->create([
            'name' => 'Jack Ferguson',
            'email' => 'jackferguson@fakeemail.com',
        ]);
    
        $ticket = Ticket::factory()->create([
            'user_id' => $user->id,
            'subject' => 'Test Subject',
            'content' => 'Test Content',
            'added_at' => now(),
            'status' => false,
        ]);
    
        $this->assertDatabaseHas('tickets', [
            'subject' => 'Test Subject',
            'content' => 'Test Content',
            'user_id' => $user->id,
            'status' => false,
        ]);
    }
}
