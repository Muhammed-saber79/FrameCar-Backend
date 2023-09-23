<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'phoneNumber' => '01064538665',
            'carType' => 'bmw_car',
            'glassType' => 'bmw',
            'glassLocation' => 'front',
            'brokenGlassImage' => 'active',
            'longitude' => 'active',
            'latitude' => 'active',
            'locationLink' => 'active',
            'user_id' => 1,
        ]);
    }
}
