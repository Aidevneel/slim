<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->any('/data', function(Request $req, Response $res,array $args){
    $res->getBody()->write("<br>end");
    return $res;
});

$app->run();

?>