<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/19/18
 * Time: 4:45 PM
 */

class Response
{
    protected $availableContentTypes = [
        'application/json',
        'text/html'
    ];

    public function __construct()
    {

    }

    public function setStatus($code)
    {
        if ($code < 100 || $code > 600) {
            throw new Exception("Wrong status code");
        }
        http_response_code($code);
    }


    public function setContentType($contentType = '')
    {
        if (!in_array($contentType, $this->availableContentTypes)) {
            echo "Unavailable content type";
            http_response_code(500);
            die();
        }

        header("Content-Type: {$contentType}");
    }


    public function notAllowedMethod() {
        $this->setStatus(405);
        echo "Method Not Allowed";
        die();
    }


    public function notFound() {
        $this->setStatus(404);
        echo "Page Not Found";
        die();
    }
}