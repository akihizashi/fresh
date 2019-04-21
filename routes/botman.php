<?php
use App\Http\Controllers\BotmanController;

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});