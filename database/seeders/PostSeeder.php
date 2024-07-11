<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Website;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $websites = Website::all();

        foreach ($websites as $website) {
            Post::create(['website_id' => $website->id, 'title' => 'Sample Post 1', 'description' => 'Description for Sample Post 1']);
            Post::create(['website_id' => $website->id, 'title' => 'Sample Post 2', 'description' => 'Description for Sample Post 2']);
        }
    }
}
