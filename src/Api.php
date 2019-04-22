<?php
namespace HamedMoody\TelegramBotApi;

use \HamedMoody\TelegramBotApi\Bot\Telegram;
use HamedMoody\TelegramBotApi\Exception\NotMethodException;

class Api{

    /**
     * Hold telegram Main Bot
     * @var \HamedMoody\TelegramBotApi\Bot\Telegram
     */
    private $bot;

    /**
     * Telegram Bot token
     * @var string
     */
    protected $token;

    public function __construct( $token )
    {
        $this->token    = $token;

        $this->bot      = new Telegram( $token );

    }


    public function __call( $name, $arguments )
    {

        if( method_exists( $this->bot, $name ) ){
            call_user_func( array( $this->bot, $name ), $arguments[0] );
        }else{

            throw new NotMethodException( 'Method ' . $name . ' does not exists' );

        }

        // TODO: Implement __call() method.
    }


    public function log( $log ){
        die( print_r( $log, true ) );
    }


}