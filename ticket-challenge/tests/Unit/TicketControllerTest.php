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
                'data' => [
                    '*' => [
                        'id',
                        'subject',
                        'content',
                        'user_name',
                        'user_email',
                        'added_at',
                        'status',
                    ]
                ],
                'links',
                'meta'
            ])
            ->assertJsonCount(10, 'data')
            ->assertJsonFragment(['total' => 20])
            ->assertJsonPath('meta.current_page', 1)
            ->assertJsonPath('meta.per_page', 10);

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
                'data' => [
                    '*' => [
                        'id',
                        'subject',
                        'content',
                        'user_name',
                        'user_email',
                        'added_at',
                        'status',
                    ]
                ],
                'links',
                'meta'
            ])
            ->assertJsonCount(10, 'data')
            ->assertJsonFragment(['total' => 20])
            ->assertJsonPath('meta.current_page', 1)
            ->assertJsonPath('meta.per_page', 10);

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
                'data' => [
                    '*' => [
                        'id',
                        'subject',
                        'content',
                        'user_name',
                        'user_email',
                        'added_at',
                        'status',
                    ]
                ],
                'links',
                'meta'
            ])
            ->assertJsonCount(10, 'data')
            ->assertJsonPath('meta.total', 40)
            ->assertJsonPath('meta.current_page', 1)
            ->assertJsonPath('meta.per_page', 10);
    }

    public function testUserTicketsEndpoint(): void
    {
        $this->seed();

        $ticket = Ticket::first();
        $email = $ticket->user->email;

        $response = $this->get("/api/users/{$email}/tickets");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'subject',
                        'content',
                        'user_name',
                        'user_email',
                        'added_at',
                        'status',
                    ]
                ],
                'links',
                'meta'
            ])
            ->assertJsonPath('meta.current_page', 1)
            ->assertJsonPath('meta.per_page', 10);
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
