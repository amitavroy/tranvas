<?php

namespace App\Modules\Event\Console;

use App\Modules\Event\Events\AddNewTweet;
use App\Modules\Event\Events\NewTweet;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class AddFakeTweet extends Command
{
    protected $signature = 'fake:tweet';

    protected $description = 'Add a fake tweet';

    public function handle()
    {
        $tweetContent = file_get_contents(resource_path("stubs/simpleTweet.json"));

        $tweet = json_decode($tweetContent, true);

        $tweet['text'] = Inspiring::quote();

        event(new AddNewTweet($tweet));

        broadcast(new NewTweet($tweet));
    }
}
