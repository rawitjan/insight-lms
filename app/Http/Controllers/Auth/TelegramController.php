<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TelegramController extends Controller
{
    public function handleProviderCallback(Request $request)
    {
        $data = $request->input();

        if (!$this->checkSignature($data)) {
            return response()->json(['error' => 'Invalid signature'], 403);
        }

        $userId = $data['id'];
        $firstName = $data['first_name'];
        $lastName = $data['last_name'];
        $username = $data['username'];
        $languageCode = $data['language_code'];
        $isPremium = $data['is_premium'] ?? false;
        $addedToAttachmentMenu = $data['added_to_attachment_menu'] ?? false;
        $allowsWriteToPm = $data['allows_write_to_pm'] ?? false;
        $photoUrl = $data['photo_url'] ?? null;

        $user = User::firstOrNew(['telegram_id' => $userId]);

        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->username = $username;
        $user->language_code = $languageCode;
        $user->is_premium = $isPremium;
        $user->added_to_attachment_menu = $addedToAttachmentMenu;
        $user->allows_write_to_pm = $allowsWriteToPm;
        $user->photo_url = $photoUrl;
        $user->save();

        Auth::login($user);

        return response()->json(['message' => 'Success'], 200);
    }

    private function checkSignature($data)
    {
        $secret = env('TELEGRAM_BOT_TOKEN'); // Используйте токен вашего бота
        $hash = hash('sha256', $secret . json_encode($data));

        return hash_equals($hash, $data['hash']);
    }
}
