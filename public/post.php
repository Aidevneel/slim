<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once __DIR__  .  '/../vendor/autoload.php';

$app = AppFactory::create();

$app->post('/', function(Request $req, Response $res, $args){
    $data = $req->getParsedBody();
    $res->getBody()->write($data['name'] . " " . $data['number']);
    return $res;
});

$app->run();

?>