<?php
/**
 * Created by PhpStorm.
 * User: Hamed
 * Date: 4/21/2019
 * Time: 11:11 PM
 */

class Telegram
{

    private $token;

    private $baseUrl;

    public function __construct( $token )
    {

        $this->token    = $token;

        $this->baseUrl  = 'https://api.telegram.org/bot' . $token . '/';

    }

}