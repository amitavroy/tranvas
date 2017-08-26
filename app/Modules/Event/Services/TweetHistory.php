<?php

namespace App\Modules\Event\Services;

use App\Modules\Event\Events\NewTweet;
use Spatie\Valuestore\Valuestore;

class TweetHistory
{
    protected $valueStore;

    /**
     * TweetHistory constructor.
     * @internal param $valueStore
     */
    public function __construct()
    {
        $this->valueStore = Valuestore::make(storage_path('app/tweetHistory.json'));
    }

    public function addTweet(array $tweet)
    {
        $allTweets = $this->valueStore->get('tweets');

        array_unshift($allTweets, $tweet);

        $tweets = array_slice($allTweets, 0, 10);

        $this->valueStore->put('tweets', $tweets);
    }

    private function getTweets()
    {
        return $this->valueStore->get('tweets');
    }

    public static function all(): array
    {
        return (new static())->getTweets();
    }
}
