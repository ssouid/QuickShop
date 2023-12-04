<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;


class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderDetail::factory()
        ->count(150)
        ->state(new Sequence(
            fn (Sequence $sequence) => [
                'order_id' => Order::all()->random(),
                'product_id' => Product::all()->random()
            ],
        ))
        ->create();
    }
}
