<?php
/**
 * Created by PhpStorm.
 * User: Hamed
 * Date: 4/21/2019
 * Time: 11:11 PM
 */

namespace HamedMoody\TelegramBotApi\Bot;

use HamedMoody\TelegramBotApi\Interfaces\TelegramInterface;
use HamedMoody\TelegramBotApi\Http\Curl;

class Telegram implements TelegramInterface
{

    private $baseUrl;

    private $token;

    private $curl;

    public function __construct( $token )
    {

        $this->token    = $token;

        $this->baseUrl  = 'https://api.telegram.org/bot' . $token . '/';

        $this->curl     = new Curl();

    }


    public function sendMessage( $params )
    {

        $this->curl->post(
            $this->baseUrl . 'sendMessage',
            array(),
            $params
        );

        // TODO: Implement sendMessage() method.
    }
}