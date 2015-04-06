<?php
// include config
require_once '../config.php';

// include the Composer autoloader
require '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


// routing stuff using League\Route
$router = new League\Route\RouteCollection;

$router->addRoute('GET', '/', function (Request $request, Response $response) {
    $controller = new Cochran\Page\PageController(); 
    $controller->view('home');
    return $response;
});

$router->addRoute('GET', '/{slug}', function (Request $request, Response $response, array $args) {
    $controller = new Cochran\Page\PageController(); 
    $controller->view($args['slug']);
    return $response;
});

$dispatcher = $router->getDispatcher();
$request = Request::createFromGlobals();
$response = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());
$response->send();
