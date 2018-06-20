<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/19/18
 * Time: 2:33 PM
 */
require_once __DIR__ . "/../config/defines.php";
//
$configs = require_once __DIR__ . "/../config/configs.php";

spl_autoload_register(
    function ($class = '') {
        $file = str_replace("\\", "/", $class);
        $filePath = SRC_PATH . DIRECTORY_SEPARATOR . $file . ".php";
        if (file_exists($filePath)) {
            include_once($filePath);
        }
    });


Configs::getInstance()->setConfig($configs);
