<?php
// include config
require_once '../config.php';

// include the Composer autoloader
require_once __ROOT__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


// routing stuff using League\Route
$router = new League\Route\RouteCollection;

$router->addRoute('GET', '/', function (Request $request, Response $response) {
    $controller = new Cochran\Page\PageController(); 
    $controller->show('home');
    return $response;
});

// * GET/page/ --> PageController::index
$router->addRoute('GET', '/page', function (Request $request, Response $response) {
    $controller = new Cochran\Page\PageController(); 
    $controller->index();
    return $response;
});
// * GET/page/create --> PageController::create
$router->addRoute('GET', '/page/create', function (Request $request, Response $response) {
    $controller = new Cochran\Page\PageController(); 
    $controller->create();
    return $response;
});
// * POST/page/ --> PageController::store
$router->addRoute('POST', '/page', function (Request $request, Response $response) {
    $controller = new Cochran\Page\PageController(); 
    $controller->store();
    return $response;
});
// * GET/page/{id} --> PageController::show

// * GET/page/{id}/edit --> PageController::edit

// * POST/page/id + REQUEST_METHOD = put --> PageController::update
// * POST/page/id + REQUEST_METHOD = put --> PageController::destroy

$router->addRoute('GET', '/{slug}', function (Request $request, Response $response, array $args) {
    $controller = new Cochran\Page\PageController(); 
    $controller->show($args['slug']);
    return $response;
});


$dispatcher = $router->getDispatcher();
$request = Request::createFromGlobals();
$response = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());
$response->send();
