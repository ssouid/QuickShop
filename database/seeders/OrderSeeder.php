<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::factory()
        ->count(150)
        ->state(new Sequence(
            fn (Sequence $sequence) => [
                'user_id' => User::all()->random()
            ],
        ))
        ->create();
    }
}
