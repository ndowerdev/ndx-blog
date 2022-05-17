<?php

require 'vendor/autoload.php';
$app = new FrameworkX\App();

$permalinks = config('permalink');
// $app->get($permalinks['index'], function (Psr\Http\Message\ServerRequestInterface $request) {
//     $html = render('index');

// });
$app->get($permalinks['index'], \Ndx\Blog\IndexController::class);
$app->get($permalinks['post'], \Ndx\Blog\PostController::class);
$app->get($permalinks['page'], \Ndx\Blog\PageController::class);

$app->run();
