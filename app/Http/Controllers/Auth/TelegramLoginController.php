<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TgWebValid\TgWebValid;

class TelegramLoginController extends Controller
{
    public function showLoginPage()
    {
        return view('auth.telegram-login'); // Страница с кнопкой входа через Telegram
    }

    // Обработка POST-запроса с данными от Telegram
    public function handleTelegramLogin(Request $request)
    {
        $tgWebAppDataRaw = $request->input('tgWebAppData');
        $tgWebAppDataDecoded = urldecode($tgWebAppDataRaw);
        parse_str($tgWebAppDataDecoded, $tgWebAppData);


        $userData = json_decode($tgWebAppData['user']);

            $user = User::where('telegram_id', $userData->id)->first();

            if (!$user) {
                // Регистрация нового пользователя
                $user = User::create([
                    'telegram_id' => $userData->id,
                    'first_name' => $userData->first_name,
                    'last_name' => $userData->last_name ?? '',
                    'username' => $userData->username ?? '',
                    'language_code' => $userData->language_code,
                    'email' => $userData->id.'@telegram',
                    'password' => $userData->id
                ]);
            }


            // Выполнение входа в систему
            Auth::login($user);
            return redirect()->route('home');
    }

    // Проверка хэша (валидация)
    protected function isValidTelegramData($tgWebAppData)
    {
        $secretToken = env('TELEGRAM_BOT_TOKEN'); // Ваш секретный токен
        $checkString = collect($tgWebAppData)
            ->except('hash') // Исключаем хэш из проверки
            ->map(function ($value, $key) {
                return "$key=$value";
            })
            ->sortKeys() // Сортируем по ключам
            ->join("\n"); // Объединяем в строку

        // Создаем хэш
        $hash = hash_hmac('sha256', $checkString, $secretToken);

        // Сравниваем хэши
        return hash_equals($hash, $tgWebAppData['hash']); // Защищенное сравнение
    }
}
