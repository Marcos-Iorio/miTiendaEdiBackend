<?php 
error_reporting(-1);
ini_set('display_errors', 1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Slim\Routing\RouteContext;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/controllers/UsuarioController.php';
require __DIR__ . '/controllers/ProductosController.php';
require __DIR__ . '/Entidades/Usuario.php';
require __DIR__ . '/Entidades/Productos.php';
require __DIR__ . '/Data/AccesoADatos.php';

$app = AppFactory::create();


$app->addErrorMiddleware(true, true, true);

// Enable CORS
$app->add(function (Request $request, RequestHandlerInterface $handler): Response {
    // $routeContext = RouteContext::fromRequest($request);
    // $routingResults = $routeContext->getRoutingResults();
    // $methods = $routingResults->getAllowedMethods();
    
    $response = $handler->handle($request);
    $requestHeaders = $request->getHeaderLine('Access-Control-Request-Headers');

    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withHeader('Access-Control-Allow-Methods', 'get, post');
    $response = $response->withHeader('Access-Control-Allow-Headers', $requestHeaders);

    // Optional: Allow Ajax CORS requests with Authorization header
    // $response = $response->withHeader('Access-Control-Allow-Credentials', 'true');

    return $response;
});

$app->group('/login', function (RouteCollectorProxy $group) {
    $group->POST('[/]', \UsuarioController::class . ':RetornarUsuario');
    
});

$app->group('/registro', function (RouteCollectorProxy $group) {
    $group->POST('[/]', \UsuarioController::class . ':RegistrarUsuario');
    
});

$app->group('/productos', function (RouteCollectorProxy $group) {
    $group->get('[/]', \ProductosController::class . ':ObtenerCategoria');
    $group->get('/todos', \ProductosController::class . ':ObtenerTodo');
    $group->POST('/prodCat', \ProductosController::class . ':ProdPorCat');
    
});

$app->run();
  
?>