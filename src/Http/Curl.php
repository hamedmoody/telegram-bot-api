<?php
/**
 * Created by PhpStorm.
 * User: Hamed
 * Date: 4/21/2019
 * Time: 09:27 PM
 */

namespace HamedMoody\TelegramBotApi\Http;

class Curl
{

    private $request = null;

    private $info;

    private $statusCode = 0;

    public function post(
        $url,
        array $urlParameters = array(),
        array $postParameters = array(),
        array $headers = array(),
        $asJSON = false
    ){

        $this->init( $url, $headers );

        /**
         * If post parameter has been set request type is Post
         */
        curl_setopt( $this->request, CURLOPT_POST, count( $postParameters ) );

        /**
         * Set parameters
         */
        if ( $asJSON === true ) {
            curl_setopt( $this->request, CURLOPT_POSTFIELDS, json_encode( $postParameters ) );
        } else {
            curl_setopt( $this->request, CURLOPT_POSTFIELDS, http_build_query( $postParameters ) );
        }


        $body               = curl_exec( $this->request );

        $this->info         = curl_getinfo( $this->request );

        curl_close( $this->request );

        $this->statusCode   = $this->info['http_code'] === 0 ? 500 : $this->info['http_code'];

        return $body;

    }

    public function getStatusCode() {
        return $this->statusCode;
    }

    public function reset(){
        $this->request = null;
    }

    private function init( $url, $headers = array() ){

        $this->request = curl_init();

        curl_setopt( $this->request, CURLOPT_URL, $url );

        curl_setopt( $this->request, CURLOPT_RETURNTRANSFER, TRUE );

        if( count( $headers ) ){
            curl_setopt( $this->request, CURLOPT_HTTPHEADER, $headers );
        }

    }

}