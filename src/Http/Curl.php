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

    private $request;

    private $info;

    private $statusCode = 0;

    public function post(
        $url,
        array $urlParameters = [],
        array $postParameters = [],
        array $headers = [],
        $asJSON = false
    ){

        $this->request = curl_init();

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

        $this->init();

        $body               = curl_exec( $this->request );

        $this->info         = curl_getinfo( $this->request );

        curl_close( $this->request );

        $this->statusCode   = $this->info['http_code'] === 0 ? 500 : $this->info['http_code'];

        return $body;

    }

    public function getStatusCode() {
        return $this->statusCode;
    }

}