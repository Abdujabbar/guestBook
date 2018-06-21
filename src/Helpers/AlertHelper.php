<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/21/18
 * Time: 1:07 PM
 */
namespace Helpers;
class AlertHelper
{
    public static function show($type = '', $message = '')
    {
        if ($message) {
            return sprintf("<div class='alert alert-%s' role='alert' style='margin-top: 5px;'>%s</div>", $type, $message);
        }
        return "";
    }
}