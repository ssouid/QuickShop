<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\OrderDetail>
 */
final class OrderDetailFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = OrderDetail::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'quantity' => fake()->randomNumber(),
            'subtotal' => fake()->randomFloat(2,500,2000),
        ];
    }
}
