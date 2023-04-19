<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->map(['GET',"POST"],'/data', function(Request $req, Response $res,array $args){
    $res->getBody()->write("<br>Hi");
    return $res;
});

$app->run();

?>