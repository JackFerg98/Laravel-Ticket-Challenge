<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * this is for testing while using yourself, as the console commands rely 
     * on users existing in the database to function properly, otherwise new 
     * users are generated and the top_user in stats will always be just 1
     * ticket.
     * 
     * call using this => ./vendor/bin/sail artisan db:seed --class=UserSeeder
     */
    public function run(): void
    {
        User::factory(10)->create(); 
    }
}
