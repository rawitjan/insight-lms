<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TgWebValid\Exceptions\ValidationException;
use TgWebValid\TgWebValid;

class TelegramLoginController extends Controller
{
    public function showLoginPage()
    {
        return view('oauth.telegram');
    }

    // Обработка POST-запроса с данными от Telegram
    public function handleTelegramLogin(Request $request)
    {
        $tgWebAppDataRaw = $request->input('tgWebAppData');

        try {
            $tgWebValid = new TgWebValid(env('TELEGRAM_BOT_TOKEN'), true);
            $initData = $tgWebValid->bot()->validateInitData($tgWebAppDataRaw);

            var_dump($initData);

        } catch (ValidationException $e) {
            echo('404040');
        };
    }
}
