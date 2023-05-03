<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Telegram
{

    protected $http;
    protected $botToken;
    const URL = 'https://api.telegram.org/bot';

    public function __construct(Http $http, $botToken = null)
    {
        $this->http = $http;
        $this->botToken = $botToken;
    }

    public function sendMessage($chat_id, $message) {
        return $this->http::post(
            self::URL.$this->botToken.'/sendMessage',
            [
                'chat_id' => $chat_id,
//                'text' => (string)view('report', $message),
                'text' => $message,
                'parse_mode' => 'html',
            ]);
    }

    public function editMessage($chat_id, $message, $message_id) {
        return $this->http::post(
            self::URL.$this->botToken.'/editMessageText',
            [
                'chat_id' => $chat_id,
//                'text' => (string)view('report', $message),
                'text' => $message,
                'message_id' => $message_id,
                'parse_mode' => 'html',
            ]);
    }

    public function sendDocument($chat_id, $file, $reply_id = null) {
        return $this->http::attach('document', Storage::get('/public/'.$file), $file)
            ->post(self::URL.$this->botToken.'/sendDocument',
            [
                'chat_id' => $chat_id,
                'reply_to_message_id' => $reply_id,
            ]);
    }

    public function sendButtons($chat_id, $message, $buttons) {
        return $this->http::post(self::URL.$this->botToken.'/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'reply_markup' => $buttons
        ]);
    }

    public function editButton($chat_id, $message, $button, $message_id) {
        return $this->http::post(self::URL.$this->botToken.'/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'reply_markup' => $button,
            'message_id' => $message_id,
        ]);
    }

}
