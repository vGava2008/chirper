<?php

namespace App\Console\Commands;

use App\Helpers\Telegram;
use App\Models\Message;
use danog\MadelineProto\API;
use danog\MadelineProto\Settings\AppInfo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ParseChannels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:telegram';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $telegram = new Telegram(new Http(), config('bots.vgaTestBotToken'));

        $settings = (new AppInfo)
            ->setApiId(24019810)
            ->setApiHash('127ca70468c23d20e510ef6d88c091b0');
        $MadelineProto = new API('session.madeline', $settings);
        $MadelineProto->start();
        $maxExecutionTime = 55;
        $startTime = time();

        $channels = [
            'https://t.me/deraketaua',
            'https://t.me/vybuh_bavovna',
            'https://t.me/monitorwarr',
            'https://t.me/kpszsu',
//            'https://t.me/renault_megane2', // for testing
        ];
        while (time() - $startTime < $maxExecutionTime) {
            foreach ($channels as $channel) {

                $data = array(
                    'peer' => '@' . $channel,
                    'offset_id' => 0,
                    'offset_date' => 0,
                    'add_offset' => 0,
                    'limit' => 1,
                    'max_id' => 0,
                    'min_id' => 0,
                    'hash' => 0
                );

                $response = $MadelineProto->messages->getHistory($data);
                $messages = $response['messages'];

                foreach ($messages as $msg) {
                    $messageId = $msg['id'];
                    $chatId = $response['chats'][0]['id'];
                    $Message = Message::firstOrCreate([
                        'chat_id' => $chatId,
                        'chat_name' => $response['chats'][0]['username'],
                        'message_id' => $messageId,
                    ], [
                        'peer_id' => $msg['peer_id'],
                        'text' => $msg['message'],
                        'date' => $msg['date'],
                    ]);
                    if($Message->wasRecentlyCreated) {
                        $telegram->sendMessage(env('TELEGRAM_CHAT_ID'), $msg['message'] . PHP_EOL . str_replace('https://t.me/',
                                ' @',
                                $channel));
                    }
                }
            }

            // Добавляем интервал в 5 секунд перед следующей итерацией
            sleep(2);
        }

        return Command::SUCCESS;
    }
}
