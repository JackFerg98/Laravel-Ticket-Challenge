<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * this is for seeding during automated testing
     */
    public function run(): void
    {
        User::factory(10)->create(); 
        Ticket::factory(20)->create();
        Ticket::factory(20)->closed()->create();
    }
}
