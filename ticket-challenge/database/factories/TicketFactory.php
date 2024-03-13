<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all()->pluck('name')->toArray();
        $userName = $this->faker->randomElement($users);
        $user = User::where('name', $userName)->first();

        return [
            'subject' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'user_name' => $user ? $userName : $this->faker->name,
            'user_email' => $user ? $user->email : $this->faker->safeEmail,
            'added_at' => now(),
            'status' => false,
        ];
    }

    public function closed()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => true,
            ];
        });
    }
}
