<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once __DIR__  .  '/../vendor/autoload.php';
require __DIR__ . '/../src/DB.php';

$app = AppFactory::create();

$app->any('/', function(Request $request, Response $response, $args){
    $response->getBody()->write("done");
    return $response;
    
});

$app->run();

?>