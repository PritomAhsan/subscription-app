<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Website;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Website::create(['name' => 'Example Website 1', 'url' => 'https://example1.com']);
        Website::create(['name' => 'Example Website 2', 'url' => 'https://example2.com']);
    }
}
