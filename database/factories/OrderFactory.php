<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Order>
 */
final class OrderFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Order::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'order_at' => fake()->dateTime(),
            'status' => fake()->randomElement(['approved', 'pending', 'rejected', 'cancelled']),
            'total_amount' => fake()->randomFloat(2,500,2000),
            'payment_method' => fake()->word,
        ];
    }
}
