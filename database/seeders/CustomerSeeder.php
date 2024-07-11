<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create(['name' => 'John Doe', 'email' => 'john@example.com']);
        Customer::create(['name' => 'Jane Doe', 'email' => 'jane@example.com']);
    }
}