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

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->getParams = $_GET ?? $_GET;
        $this->postParams = $_POST ?? $_POST;
        $this->parseURI();
    }

    protected function parseURI()
    {
        if (isset($_SERVER['REQUEST_URI']) && strlen($_SERVER['REQUEST_URI']) > 1) {
            $this->uri = rtrim(explode("?", $_SERVER['REQUEST_URI'])[0], '/');
        }

        if (empty($this->uri)) {
            $this->uri = '/';
        }
    }

    /**
     * @return mixed
     */
    public function getURI()
    {
        return $this->uri;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getParam(string $name = '')
    {
        return $this->getParams[$name] ?? $this->getParams[$name];
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getPost(string $name = '')
    {
        return $this->postParams[$name] ?? $this->postParams[$name];
    }

    /**
     * @return mixed
     */
    public function getPostParams() {
        return $this->postParams;
    }

    public function getParams() {
        return $this->getParams;
    }


    public function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
}