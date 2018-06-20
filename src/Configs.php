<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/20/18
 * Time: 2:50 PM
 */

class Configs
{
    protected static $instance;
    protected $configs = [];

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setConfig($configs = [])
    {
        $this->configs = $configs;
    }


    public function getByName($name = '')
    {
        return $this->configs[$name] ?? $this->configs[$name];
    }
}