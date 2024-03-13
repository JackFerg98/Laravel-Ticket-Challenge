<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Ticket;

class TicketControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testOpenTicketsEndpoint(): void
    {
        $this->seed();

        $response = $this->get('/api/tickets/open');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                    'current_page',
                    'data',
                    'first_page_url',
                    'from',
                    'last_page',
                    'last_page_url',
                    'links',
                    'next_page_url',
                    'path',
                    'per_page',
                    'prev_page_url',
                    'to',
                    'total',
                 ])
                 ->assertJsonCount(10, 'data')
                 ->assertJsonFragment(['total' => 20])
                 ->assertJsonPath('current_page', 1)
                 ->assertJsonPath('per_page', 10);

                 $this->assertNotEmpty($response['data']);

                 foreach ($response['data'] as $ticket) {
                     $this->assertFalse($ticket['status']);
                 }
    }

    public function testClosedTicketsEndpoint(): void
    {
        $this->seed();

        $response = $this->get('/api/tickets/closed');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                    'current_page',
                    'data',
                    'first_page_url',
                    'from',
                    'last_page',
                    'last_page_url',
                    'links',
                    'next_page_url',
                    'path',
                    'per_page',
                    'prev_page_url',
                    'to',
                    'total',
                 ])
                 ->assertJsonCount(10, 'data')
                 ->assertJsonFragment(['total' => 20])
                 ->assertJsonPath('current_page', 1)
                 ->assertJsonPath('per_page', 10);

        $this->assertNotEmpty($response['data']);

        foreach ($response['data'] as $ticket) {
            $this->assertTrue($ticket['status']);
        }
    }

    public function testAllTicketsEndpoint(): void
    {
        $this->seed();

        $response = $this->get('/api/tickets');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                    'current_page',
                    'data',
                    'first_page_url',
                    'from',
                    'last_page',
                    'last_page_url',
                    'links',
                    'next_page_url',
                    'path',
                    'per_page',
                    'prev_page_url',
                    'to',
                    'total',
                 ])
                 ->assertJsonCount(10, 'data')
                 ->assertJsonFragment(['total' => 40])
                 ->assertJsonPath('current_page', 1)
                 ->assertJsonPath('per_page', 10);
    }

    public function testUserTicketsEndpoint(): void
    {
        $this->seed();

        $ticket = Ticket::all()->first();
        $email = $ticket->user_email;

        $response = $this->get("/api/users/{$email}/tickets");

        $response->assertStatus(200)
                 ->assertJsonStructure([
                    'current_page',
                    'data',
                    'first_page_url',
                    'from',
                    'last_page',
                    'last_page_url',
                    'links',
                    'next_page_url',
                    'path',
                    'per_page',
                    'prev_page_url',
                    'to',
                    'total',
                 ])
                 ->assertJsonPath('current_page', 1)
                 ->assertJsonPath('per_page', 10);
    }
    
    public function testStatsEndpoint(): void
    {
        $this->seed();

        $response = $this->get('/api/stats');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                    'total_tickets',
                    'unprocessed_tickets',
                    'top_user',
                    'last_processing_time',
                 ]);
    }
}
