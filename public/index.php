<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/19/18
 * Time: 1:56 PM
 */



require_once __DIR__ . '/../src' . DIRECTORY_SEPARATOR . 'bootstrap.php';




$app = new App();


$app->registerEndpoint("/", function(Request $request,  Response $response) {
    $view = new \View\View();
    $name = $request->getParam('name') ? $request->getParam('name') : 'Guest';
    $paginator = new \Pagination\Pagination("http://localhost:8081/", 100, 10);
    $view->render('index', ['name' => $name, 'paginator' => $paginator]);
});

$app->registerEndpoint('/create-post', function(Request $request, Response $response) {
    if(!$request->isPost()) {
        $response->notAllowedMethod();
    }


});


try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}