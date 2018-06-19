<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/19/18
 * Time: 4:42 PM
 */

class Request
{
    protected $getParams;
    protected $postParams;
    protected $uri;
    public function __construct()
    {
        $this->getParams = $_GET ?? $_GET;
        $this->postParams = $_POST ?? $_POST;
        $this->parseURI();
    }

    protected function parseURI() {
        $this->uri = $_SERVER['REQUEST_URI'] ?? explode("?", $_SERVER['REQUEST_URI'])[0];
    }

    public function getURI() {
        return $this->uri;
    }
    public function getParam($name = '') {
        return $this->getParams[$name] ?? $this->getParams[$name];
    }

    public function getPost($name = '') {
        return $this->postParams[$name] ?? $this->postParams[$name];
    }
}