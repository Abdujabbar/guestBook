<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/19/18
 * Time: 4:45 PM
 */

class Response
{

    public function __construct()
    {

    }

    public function setStatus($code) {
        if($code < 100 || $code > 600) {
            throw new Exception("Wrong status code");
        }
        http_response_code($code);
    }
}