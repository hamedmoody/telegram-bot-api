<?php
/**
 * Created by PhpStorm.
 * User: Hamed
 * Date: 4/22/2019
 * Time: 06:54 AM
 */

namespace HamedMoody\TelegramBotApi\Interfaces;

interface TelegramInterface{

    public function sendMessage( $params );

}