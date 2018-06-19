<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/19/18
 * Time: 2:33 PM
 */

spl_autoload_register(/**
 * @param string $class
 */
    function ($class = '') {
        $file = str_replace("\\", "/", $class);
        $filePath = SRC_PATH . DIRECTORY_SEPARATOR. $file . ".php";
        if (file_exists($filePath)) {
            include_once($filePath);
        }
    });