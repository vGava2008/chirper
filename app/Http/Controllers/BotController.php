<?php

namespace App\Http\Controllers;

use App\Helpers\Telegram;
use App\Http\Controllers\Controller;
use App\Models\Message;
use danog\MadelineProto\API;
use danog\MadelineProto\Settings\AppInfo;
use Illuminate\Support\Facades\Http;

class BotController extends Controller
{
    public function index()
    {

        $telegram = new Telegram(new Http(), config('bots.vgaTestBotToken'));

        $telegram->

        $settings = (new AppInfo)
            ->setApiId(24019810)
            ->setApiHash('127ca70468c23d20e510ef6d88c091b0');
        $MadelineProto = new API('session.madeline', $settings);
        $MadelineProto->start();
        $val['url'] = 'https://t.me/deraketaua';
        $data = array(
            'peer' => '@'.$val['url'], //название_канала, должно начинаться с @, например @breakingmash, все остальные параметры, кроме limit, можно оставить равными 0
            'offset_id' => 0,
            'offset_date' => 0,
            'add_offset' => 0,
            'limit' => 1, //Количество постов, которые вернет клиент
            'max_id' => 0, //Максимальный id поста
            'min_id' => 0, //Минимальный id поста - использую для пагинации, при  0 возвращаются последние посты.
            'hash' => 0
        );

        $response = $MadelineProto->messages->getHistory($data);
        $Message = Message::create([
            'chat_id' => $response['chats'][0]['id'],
            'chat_name' => $response['chats'][0]['username'],
            'message_id' => $response['messages'][0]['id'],
            'peer_id' => $response['messages'][0]['peer_id'],
            'text' => $response['messages'][0]['message'],
            'date' => $response['messages'][0]['date'],
        ]);







        $settings = (new AppInfo)
            ->setApiId(24019810)
            ->setApiHash('127ca70468c23d20e510ef6d88c091b0');
        $MadelineProto = new API('session.madeline', $settings);
        $MadelineProto->start();
        dd($MadelineProto);
        $InputChannel = -1001343028414;
        $messages = $MadelineProto->channels->getMessages('werwer', $InputChannel);
        dd($messages);

//        dd($MadelineProto);

        $me = $MadelineProto->getSelf();
        $MadelineProto->logger($me);

        if (!$me['bot']) {

            $MadelineProto->loop(function () use ($MadelineProto) {
                yield $MadelineProto->start();

                // Получение обновлений
                $MadelineProto->getUpdates();
            });

            try {
                $full_chat = $MadelineProto->getFullInfo(-1001343028414);
                dd($full_chat);
            } catch (\danog\MadelineProto\RPCErrorException $e) {
                // Handle the RPC error, e.g., log or print the error message
                echo 'RPC Error: ' . $e->getMessage();
            } catch (\danog\MadelineProto\TelegramException $e) {
                // Handle other Telegram-related errors
                echo 'Telegram Exception: ' . $e->getMessage();
            }
            try {
                $MadelineProto->messages->importChatInvite(hash: 'https://t.me/+Por5orOjwgccnt2w');
            } catch (\danog\MadelineProto\RPCErrorException $e) {
                $MadelineProto->logger($e);
            }
        }
        $MadelineProto->echo('OK, done!');
    }
}
