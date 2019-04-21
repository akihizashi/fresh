<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan; 
use BotMan\BotMan\BotManFactory; 
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Web\WebDriver;
use BotMan\BotMan\Cache\LaravelCache;

class BotmanController extends Controller
{
    // protected $botman;
     
    public function __construct()
    {
        $config = [
            'conversation_cache_time' => 40, // Cache settings
            'user_cache_time' => 30, // Cache settings
            'web' => [ // Bringing in the web driver config
                'matchingData' => [
                    'driver' => 'web',
                ],
            ]
        ];
        DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
  
        // $botman = BotManFactory::create($config, new LaravelCache(), app()->make('request')); // Bring in the request!

        // Start listening
        // $botman->listen();
    }

    public function handle()
    {
        // dd($botman);
        // $this->botman = app('botman');
        $botman = app('botman');
        $botman->hears('hello', function (BotMan $bot) {
            $bot->reply('Hello Long');
        });
        $botman->listen();
    }

    public function startConversation(BotMan $bot)
    {
        $bot->startConversation();
    }

    public function index()
    {
        // $botman = $this->botman;
        // dump($this->botman->hears('hello', function (BotMan $bot) {
        //     $bot->reply('Hello yourself.');
        // }));
        return view('botman.index', compact('botman'));
    }
}
