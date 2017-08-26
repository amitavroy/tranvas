<?php

namespace App\Modules\Event\Console;

use App\Modules\Event\Events\AddNewTweet;
use App\Modules\Event\Events\NewTweet;
use Illuminate\Console\Command;

class FetchTweets extends Command
{
    protected $signature = 'fetch:twitter-stream';

    protected $description = 'Fetch tweets for an event';

    public function handle()
    {
        app(\Spatie\LaravelTwitterStreamingApi\TwitterStreamingApi::class)
            ->publicStream()
            ->whenHears([
                '#vuejs',
                '#laravel'
            ], function (array $tweet) {
                event(new AddNewTweet($tweet));
                broadcast(new NewTweet($tweet));
            })
            ->startListening();
    }
}
