<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/19/18
 * Time: 1:56 PM
 */


require_once __DIR__ . '/../src' . DIRECTORY_SEPARATOR . 'bootstrap.php';


$app = new App();


$app->registerEndpoint("/", function (Request $request, Response $response) {
    $postsRepository = new \Repository\PostRepository();
    $total = $postsRepository->getTotal();
    $currentPage = $request->getParam('page') ? $request->getParam('page') : 1;
    if(!is_numeric($currentPage)) {
        $currentPage = 1;
    }
    $limit = 1;
    $items = $postsRepository->getList($limit, $limit * ($currentPage - 1));
    $view = new \View\View();
    $view->render('index',
        [
            'items' => $items,
            'paginator' => new \Pagination\Pagination("http://localhost:8080", $total, $limit)
        ]);

});

$app->registerEndpoint('/create', function (Request $request, Response $response) {
    $postRepository = new \Repository\PostRepository();
    $post = new Post($request->getPostParams());

    if ($request->isPost()) {
        if ($post->validate() && $postRepository->save($post)) {
            Session::getInstance()->setFlash("success", "Operation Success");
            $response->redirect('/');
        }
    }
    $view = new \View\View();
    $view->render('create', ['post' => $post]);
});


try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
