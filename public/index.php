<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/19/18
 * Time: 1:56 PM
 */


define('APP_ROOT', __DIR__ . '/../');
define('SRC_PATH', APP_ROOT . 'src');
define('TEMPLATE_PATH', SRC_PATH . DIRECTORY_SEPARATOR. 'templates');
require_once SRC_PATH . DIRECTORY_SEPARATOR . 'bootstrap.php';


$app = new App();

$app->registerEndpoint("/", function(Request $request,  Response $response) {

});
try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}