<?php

namespace App\Console\Commands;

use App\Mail\PostPublished;
use App\Models\Post;
use App\Models\SentPost;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendPostEmails extends Command
{
    protected $signature = 'send:post-emails';
    protected $description = 'Send post emails to subscribers';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get posts that have not been sent
        $posts = Post::doesntHave('sentPosts')->with('website.subscriptions.customer')->get();

        foreach ($posts as $post) {
            foreach ($post->website->subscriptions as $subscription) {
                // Check if the post has already been sent to this subscription
                if (!SentPost::where('subscription_id', $subscription->id)->where('post_id', $post->id)->exists()) {
                    // Send email
                    Mail::to($subscription->customer->email)->queue(new PostPublished($post));

                    // Record the sent post
                    SentPost::create([
                        'subscription_id' => $subscription->id,
                        'post_id' => $post->id,
                    ]);
                }
            }
        }

        return 0;
    }
}
