<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once __DIR__  .  '/../vendor/autoload.php';

$app = AppFactory::create();

// return JSON response
$app->post('/', function(Request $req, Response $res,array $args){
    $resdata = array('hello' => "neel");
    $resbody = json_encode($resdata); 
    $res->getBody()->write($resbody);
    return $res;
});

$app->run();

?>