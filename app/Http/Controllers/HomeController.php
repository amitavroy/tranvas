<?php

namespace App\Http\Controllers;

use App\Modules\Event\Services\TweetHistory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TweetHistory $history)
    {
//        $history->addTweet([123,123,123]);
        $t = $history::all();
        dump($t);
        return view('home');
    }

    public function welcome()
    {
        return view('welcome');
    }
}
