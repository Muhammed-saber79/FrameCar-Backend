<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'FrameCar Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Password#123'),
            'super_admin' => 1,
            'status' => 'active'
        ]);

        Admin::create([
            'name' => 'FrameCar Admin2',
            'email' => 'mohaamed.sabeer20@gmail.com',
            'password' => Hash::make('Password#123'),
            'super_admin' => 1,
            'status' => 'active'
        ]);
    }
}
