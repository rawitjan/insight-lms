<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Micromagicman\TelegramWebApp\Http\WebAppDataValidationMiddleware;
use Micromagicman\TelegramWebApp\Api\TelegramBotApi;
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', );
    }
}
