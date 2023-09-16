<?php

namespace ltdsh\TelegramBotSender;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TelegramBotSender extends Bundle
{
    public function sendSimpleMessage($token, $chatId, $text)
    {
        $getQuery = array(
            "chat_id" 	=> $chatId,
            "text"  	=> $text,
            "parse_mode" => "html",
        );
        $ch = curl_init("https://api.telegram.org/bot". $token ."/sendMessage?" . http_build_query($getQuery));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $resultQuery = curl_exec($ch);
        curl_close($ch);

        return $resultQuery;
    }
}
