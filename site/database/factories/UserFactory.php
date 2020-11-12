<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()

    {
        $group = [
            '2184',
            '2185',
            '2284',
            '2285',
            '2384',
        ];
        $name = $this->faker->lastName;
        $firstName = $this->faker->firstName;
        return [
            'name' => $name,
            'first_name' => $firstName,
            'slug' => Str::slug($name . ' ' . $firstName),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'group' => $group[rand(0, count($group) - 1)],
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
