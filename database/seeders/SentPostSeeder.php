<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SentPost;
use App\Models\Subscription;
use App\Models\Post;

class SentPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subscriptions = Subscription::all();
        $posts = Post::all();

        foreach ($subscriptions as $subscription) {
            foreach ($posts as $post) {
                if (rand(0, 1)) {
                    SentPost::create(['subscription_id' => $subscription->id, 'post_id' => $post->id]);
                }
            }
        }
    }
}
