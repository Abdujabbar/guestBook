<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/21/18
 * Time: 3:06 PM
 */

class Session
{
    public static $instance;
    public function __construct()
    {
        session_start();
    }

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setFlash($name, $flash) {
        $_SESSION[$name] = $flash;
    }

    public function getFlash($name) {
        if(!empty($_SESSION[$name])) {
            $flash = $_SESSION[$name];
            unset($_SESSION[$name]);
            return $flash;
        }
        return null;
    }
}