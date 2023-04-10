<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->addBodyParsingMiddleware(); 
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->put('/users/password', function (Request $request, Response $response, $args): Response {
    $data = $request->getParsedBody();

    $response = $response->withHeader('Content-Type', 'application/json');
    $response->getBody()->write(json_encode($data));

    return $response;
});

$app->run();